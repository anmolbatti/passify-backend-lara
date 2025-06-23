<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'price',
        'currency_symbol',
        'plan_type',
        'trial_period_in_days',
        'card_design_count',
        'location_count',
        'user_count',
        'card_redesign_annual_count',
        'exportable',
        'is_notification_on',
        'status',
        'notification_users_count'
    ];
}
