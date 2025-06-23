<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Pass\DesignStoreRequest;
use App\Http\Requests\API\Pass\DetailsStoreRequest;
use App\Http\Requests\API\Pass\FieldStoreRequest;
use App\Http\Requests\API\Pass\LocationStoreRequest;
use App\Http\Requests\API\Pass\PublishPassAPIRequest;
use App\Http\Requests\API\Pass\ReadByIdPassRequest;
use App\Http\Requests\API\Pass\StoreNewLocationAPIRequest;
use App\Http\Requests\API\Pass\UpdateDesignRequest;
use App\Http\Requests\API\Pass\DeletePassLocationRequest;
use App\Http\Requests\API\Pass\ReadLocationsByUserRequest;
use App\Http\Traits\ApiResponse;
use App\Interfaces\API\PassRepositoryInterface;
use App\Models\PassUser;
use Illuminate\Http\Request;
use App\Rules\validateImageSize;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PassController extends Controller
{
    //
    private $pass_repository;
    use ApiResponse;

    public function __construct(PassRepositoryInterface $pass_repository)
    {
        $this->pass_repository = $pass_repository;
    }

    public function storeDesign(DesignStoreRequest $request)
    {
        $pass = $this->pass_repository->storeDesign($request);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Design have been created Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function storeTemplate(Request $request)
    {

        $request->validate([
            'reward_type' => 'required',
            'no_of_stamps' => 'required',
            'card_bg_color' => 'required',
            'card_txt_color' => 'required',
            'strip_bg_color' => 'required_without_all:strip_bg_image',
            'stamps_color' => 'required',
            'stamps_border_color' => 'required',
            'stamp_image_color' => 'required',
            'unstamp_image_color' => 'required',
            'reward_bg_color' => 'required',
            'reward_border_color' => 'required',
            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'un_stamps_icon' => 'required_without_all:un_stamps_image',

            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',

            'un_stamps_icon' => 'required_without_all:un_stamps_image',

            'qr_type' => 'required',
        ]);

        if ($request->hasFile('logo_image') && is_file($request->file('logo_image'))) {
            $request->validate([
                'logo_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('icon_image') && is_file($request->file('icon_image'))) {
            $request->validate([
                'icon_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('un_stamps_image') && is_file($request->file('un_stamps_image'))) {
            $request->validate([
                'un_stamps_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('picked_stamps_image') && is_file($request->file('picked_stamps_image'))) {
            $request->validate([
                'picked_stamps_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('strip_bg_image') && is_file($request->file('strip_bg_image'))) {
            $request->validate([
                'strip_bg_image' => ['required', new validateImageSize],
            ]);
        }

        $pass = $this->pass_repository->storeDesign($request);

        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Design have been created Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function updateDesignById(Request $request)
    {

        $request->validate([
            'reward_type' => 'required',
            'no_of_stamps' => 'required',
            'card_bg_color' => 'required',
            'card_txt_color' => 'required',
            'strip_bg_color' => 'required_without_all:strip_bg_image',
            'stamps_color' => 'required',
            'stamps_border_color' => 'required',
            'stamp_image_color' => 'required',
            'unstamp_image_color' => 'required',
            'reward_bg_color' => 'required',
            'reward_border_color' => 'required',
            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'un_stamps_icon' => 'required_without_all:un_stamps_image',
            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'un_stamps_icon' => 'required_without_all:un_stamps_image',
            'qr_type' => 'required',
        ]);

        if ($request->hasFile('logo_image') && is_file($request->file('logo_image'))) {
            $request->validate([
                'logo_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('icon_image') && is_file($request->file('icon_image'))) {
            $request->validate([
                'icon_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('un_stamps_image') && is_file($request->file('un_stamps_image'))) {
            $request->validate([
                'un_stamps_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('picked_stamps_image') && is_file($request->file('picked_stamps_image'))) {
            $request->validate([
                'picked_stamps_image' => ['required', new validateImageSize],
            ]);
        }
        if ($request->hasFile('strip_bg_image') && is_file($request->file('strip_bg_image'))) {
            $request->validate([
                'strip_bg_image' => ['required', new validateImageSize],
            ]);
        }

        $pass = $this->pass_repository->updateDesignById($request);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Design have been updated Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function storeDetails(DetailsStoreRequest $request)
    {
        $pass = $this->pass_repository->storeDetails($request);
        // return $pass;
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Details have been saved Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function readById($id)
    {
        $pass = $this->pass_repository->readById($id);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Pass Details are provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function storeFields(FieldStoreRequest $request)
    {
        $pass = $this->pass_repository->storeFields($request);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "The Fields have been saved Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function updatePassLocation(LocationStoreRequest $request)
    {
        $pass = $this->pass_repository->updatePassLocation($request);
        if ($pass['status']) {
            $data = "";
            $message = $pass['data'];
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    // public function storeLocation(LocationStoreRequest $request){
    //     $pass = $this->pass_repository->storeLocation($request);
    //     if ($pass['status']) {
    //         $data = $pass['data'];
    //         $message = "The Fields have been saved Successfully.";
    //         return $this->success_response($data,$message);
    //     } else {
    //         $error = $pass['error'];
    //         $message = "Something went wrong";
    //         return $this->fail_response($message);
    //     }
    // }

    public function readLocationsOfUser(Request $request, $pass_id)
    {
        // $request->id = $pass_id;
        $readLocationsOfUser = $this->pass_repository->readLocationsOfUser($pass_id);
        if ($readLocationsOfUser['status']) {
            $data = $readLocationsOfUser['data'];
            $message = "Locations list has been provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $readLocationsOfUser['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    // public function deletePassLocation(DeletePassLocationRequest $request){
    //     $pass = $this->pass_repository->deletePassLocation($request);
    //     if ($pass['status']) {
    //         $data = $pass['data'];
    //         $message = "Location against Pass has been deleted Successfully.";
    //         return $this->success_response($data,$message);
    //     } else {
    //         $error = $pass['error'];
    //         $message = "Something went wrong";
    //         return $this->fail_response($error);
    //     }
    // }

    public function storeNewLocation(StoreNewLocationAPIRequest $request)
    {
        $location = $this->pass_repository->storeNewLocation($request->all());
        if ($location['status']) {
            $data = $location['data'];
            $message = "The Location has been created successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $location['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function publish(PublishPassAPIRequest $request)
    {
        $pass = $this->pass_repository->publish($request->all());
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "Your pass is published successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function readByUser($offset = 0, $limit = 6)
    {
        $pass = $this->pass_repository->readByUser($offset, $limit);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "Passes list is provided successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function detailById($id)
    {
        $pass = $this->pass_repository->detailById($id);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "Pass details are provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function deleteById($id)
    {
        $pass = $this->pass_repository->deleteById($id);
        if ($pass['status']) {
            $data = $pass['data'];
            $message = "Pass is deleted Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $pass['error'];
            $message = $error;
            return $this->fail_response($message);
        }
    }

    public function deleteLocation($id)
    {
        $location = $this->pass_repository->deleteLocation($id);
        if ($location['status']) {
            $data = $location['data'];
            $message = "Location is deleted Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $location['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function getCards()
    {
        $cards = $this->pass_repository->getCards();
        if ($cards['status']) {
            $data = $cards['data'];
            $message = "Card designs are provided successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $cards['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function getHomeCardDetails()
    {
        $user = auth()->user();

        $passes = PassUser::where('user_id', $user->id)->count();

        $rewards = PassUser::where('user_id', $user->id)->whereColumn('stamps_required_for_reward', '=', 'stamps_earned')->count();

        $pending = $passes - $rewards;

        $data = [
            'customers_signed_up' => $passes,
            'wallet_install' => $passes,
            'rewards_redeemed' => $rewards,
            'wallet_unistall' => 0,
            'pending_redeems' => $pending
        ];

        return $this->success_response($data, 'success');
    }

    public function getBarGraph()
    {
        $user = auth()->user();
        $countsByDay = [];
        for ($day = 0; $day <= 6; $day++) {
            $dayOfWeek = now()->startOfWeek()->addDays($day)->format('l');

            $passesCount = PassUser::where('user_id', $user->id)
                ->where(DB::raw('WEEKDAY(created_at)'), $day)
                ->count();

            $rewardsCount = PassUser::where('user_id', $user->id)
                ->whereColumn('stamps_required_for_reward', '=', 'stamps_earned')
                ->where(DB::raw('WEEKDAY(created_at)'), $day)
                ->count();

            $countsByDay[$dayOfWeek] = [
                'passes' => $passesCount,
                'rewards' => $rewardsCount
            ];
        }

        return $this->success_response($countsByDay, 'success');
    }

    public function getWaveGraph(Request $request)
    {
        $user = auth()->user();
        $status = $request->period;

        $totalQuery = PassUser::where('user_id', $user->id);
        $rewardQuery = PassUser::where('user_id', $user->id)->whereColumn('stamps_required_for_reward', '=', 'stamps_earned');
        $totalCounts = [];
        $rewardCounts = [];

        if ($status === 'monthly') {
            $currentYear = Carbon::now()->year;
            $currentMonth = now()->month;
            $rewardQuery->whereYear('created_at', $currentYear);
            $totalQuery->whereYear("created_at", $currentYear);


            for ($i = 1; $i <= $currentMonth; $i++) {
                $totalQueryClone = clone $totalQuery;
                $rewardQueryClone = clone $rewardQuery;

                $totalCounts[Carbon::createFromDate($currentYear, $i, 1)->format('F')] = $totalQueryClone->whereMonth('created_at', $i)->count();
                $rewardCounts[Carbon::createFromDate($currentYear, $i, 1)->format('F')] = $rewardQueryClone->whereMonth('created_at', $i)->count();
            }
        } elseif ($status === 'yearly') {
            $lastFiveYears = range(Carbon::now()->year - 5, Carbon::now()->year);
            $totalQuery->whereIn(DB::raw('YEAR(created_at)'), $lastFiveYears);
            $rewardQuery->whereIn(DB::raw('YEAR(created_at)'), $lastFiveYears);
            foreach ($lastFiveYears as $year) {
                $totalQueryClone = clone $totalQuery;
                $rewardQueryClone = clone $rewardQuery;

                $totalCounts[$year] = $totalQueryClone->whereYear('created_at', $year)->count();
                $rewardCounts[$year] = $rewardQueryClone->whereYear('created_at', $year)->count();
            }
        } elseif ($status === 'weekly') {
            $totalQuery->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $rewardQuery->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            for ($i = Carbon::SUNDAY; $i <= Carbon::SATURDAY; $i++) {
                $dayName = Carbon::now()->startOfWeek()->day($i)->format('l');
                $totalCounts[$dayName] = $totalQuery->whereDay('created_at', $i)->count();
                $rewardCounts[$dayName] = $rewardQuery->whereDay('created_at', $i)->count();
            }
        }

        $result = [
            'total_installs' => $totalCounts,
            'reward_counts' => $rewardCounts
        ];

        return $this->success_response($result, 'success');
    }
}
