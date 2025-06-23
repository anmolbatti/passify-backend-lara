<?php

namespace App\Http\Traits;

use App\Models\QuotaUsage;
use App\Models\Subscription;
use Carbon\Carbon;

trait Quota
{

    // card design count
    public function AddCardDesignCount($vendor_id)
    {
        return $this->AddQuota($vendor_id, "card_design_count");
    }
    public function CheckCardDesignCount($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "card_design_count");
    }

    // location count
    public function AddLocationCount($vendor_id)
    {
        return $this->AddQuota($vendor_id, "location_count");
    }
    public function CheckLocationCount($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "location_count");
    }

    // user count
    public function AddUserCount($vendor_id)
    {
        return $this->AddQuota($vendor_id, "user_count");
    }
    public function CheckUserCount($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "user_count");
    }

    // card redesign annual count
    public function AddCardRedesignAnnualCount($vendor_id)
    {
        return $this->AddQuota($vendor_id, "card_redesign_annual_count");
    }
    public function CheckCardRedesignAnnualCount($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "card_redesign_annual_count");
    }

    // card exportable count
    public function CheckExportable($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "exportable");
    }

    // card is_notification_on count
    public function CheckIsNotificationOn($vendor_id)
    {
        return $this->CheckQuota($vendor_id, "is_notification_on");
    }

    // genaric function to add entry on quota usages table
    protected function AddQuota($vendor_id, $quota_type)
    {
        return QuotaUsage::create([
            "vendor_id" => $vendor_id,
            "quota_type" => $quota_type,
            "usage" => '1'
        ]);
    }

    // genaric function to check quota usages table
    protected function CheckQuota($vendor_id, $quota_type)
    {
        if ($quota_type == 'card_redesign_annual_count') {
            $quota_usage = QuotaUsage::where('vendor_id', $vendor_id)->where('quota_type', $quota_type)->whereYear('created_at', '=', Carbon::now()->year)->where('status', true)->sum('usage');
        } else {
            $quota_usage = QuotaUsage::where('vendor_id', $vendor_id)->where('quota_type', $quota_type)->where('status', true)->sum('usage');
        }
        $quota_planned = Subscription::where("user_id", $vendor_id)->has('plan')->with('plan')->first();

        if (
            $quota_planned
            && $quota_usage < $quota_planned->plan->$quota_type
            && $quota_planned->plan->$quota_type != null
        ) {
            return true;
        } else {
            return false;
        }
    }
}
