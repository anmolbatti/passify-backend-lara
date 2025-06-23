<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\LoyaltyCardController;
use App\Http\Controllers\API\LibraryController;
use App\Http\Controllers\API\PassController;
use App\Http\Controllers\API\PlanController;
use App\Http\Controllers\API\SubUserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoyalityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MessageController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/store/data', [CouponController::class, 'storeAppleData']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function () {
    Route::post('/sign_up', [AuthController::class, 'register'])->name('register.user');
    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
});
Route::post('/login', [AuthController::class, 'login']);

Route::post('/forget-password', [AuthController::class, 'forgetPassword']);

Route::get("/getCards", [PassController::class, "getCards"])->name("getCards");

Route::middleware('auth:api')->group(function () {
    ########################################User###############################################
    Route::prefix("user")->group(function () {
        Route::post('/changeLanguage', [AuthController::class, 'changeLanguage'])->name('user.changeLanguage');
        Route::post("/delete", [AuthController::class, "delete"])->name("user.delete");
        Route::post("/readById", [AuthController::class, "readById"])->name("user.readById");
        Route::post("/getUserInfo", [AuthController::class, "getUserInfo"])->name("user.getUserInfo");
        Route::post("/updatePassword", [AuthController::class, "updatePassword"])->name("user.updatePassword");
    });

    Route::middleware(['api', 'CheckUserTrialPeriod'])->group(function () {
        ########################################Pass###############################################
        Route::prefix("pass")->group(function () {
            Route::post("/publish", [PassController::class, "publish"])->name("pass.publish");
            Route::post("/storeDesign", [PassController::class, "storeDesign"])->name("pass.storeDesign");
            Route::post("/storeTemplate", [PassController::class, "storeTemplate"])->name("pass.storeTemplate");
            Route::post("/storeDetails", [PassController::class, "storeDetails"])->name("pass.storeDetails");
            Route::post("/storeFields", [PassController::class, "storeFields"])->name("pass.storeFields");
            Route::get("/readLocationsOfUser/{pass_id}", [PassController::class, "readLocationsOfUser"])->name("pass.readLocationsOfUser");
            Route::post("/updatePassLocation", [PassController::class, "updatePassLocation"])->name("pass.updatePassLocation");
            // Route::post("/storeLocation", [PassController::class, "storeLocation"])->name("pass.storeLocation");
            // Route::post("/deletePassLocation", [PassController::class, "deletePassLocation"])->name("pass.deletePassLocation");
            Route::post("/storeNewLocation", [PassController::class, "storeNewLocation"])->name("pass.storeNewLocation");
            Route::post("/deleteLocation/{id}", [PassController::class, "deleteLocation"])->name("pass.deleteLocation");
            Route::get("/readById/{id}", [PassController::class, "readById"])->name("pass.readById");
            Route::get("/readByUser/{offset?}/{limit?}", [PassController::class, "readByUser"])->name("pass.readByUser");
            Route::post("/updateDesignById", [PassController::class, "updateDesignById"])->name("pass.updateDesignById");
            Route::get("/detailById/{id}", [PassController::class, "detailById"])->name("pass.detailById");
            Route::post("/deleteById/{id}", [PassController::class, "deleteById"])->name("pass.deleteById");
        });
        Route::get('subusers/index', [SubUserController::class, 'index']);
        Route::post('subuser/store', [SubUserController::class, 'store']);
        Route::get('subuser/show/{id?}', [SubUserController::class, 'show']);
        Route::post('subuser/update/{id?}', [SubUserController::class, 'update']);
        Route::post('subuser/delete/{id}', [SubUserController::class, 'delete']);
        Route::post('update/profile', [SubUserController::class, 'updateProfile']);



        Route::prefix("message")->group(function () {
            Route::get("/history", [MessageController::class, "messageHistory"]);
            Route::get("/user/{id}", [MessageController::class, "passUserList"]);
        });

        Route::post('/loyalty/card/sendMessage', [MessageController::class, 'sendMessage']);

        Route::prefix("library")->group(function () {
            Route::get("/list", [LibraryController::class, "index"]);
            Route::get("/details/{id?}", [LibraryController::class, "details"]);

        });

    });


    ########################################Plans###############################################
    Route::prefix("plans")->group(function () {
        Route::get("/", [PlanController::class, "index"])->name("plans.index");
        Route::get("/{id}", [PlanController::class, "show"])->name("plans.show");
        Route::post("/payment", [PlanController::class, "payment"])->name("plans.payment");
        Route::post("/refund_check", [PlanController::class, "refund_check"])->name("plans.refund_check");
    });


    Route::get('/dashboard/home', [DashboardController::class, 'home']);


    Route::prefix("admin")->group(function () {
        Route::get("/", [PlanController::class, "index"])->name("plans.index");
    });

});

// Route::get('/dashboard/home',[DashboardController::class,'home']);
Route::get('/loyalty/card/details/{customerId}', [LoyaltyCardController::class, 'getCardDetails']);
Route::get('/loyalty/card/details/serialNumber/{serialNumber}', [LoyaltyCardController::class, 'getCardDetailsBySerialNumber']);
Route::post('/loyalty/card/details/{customerId}', [LoyaltyCardController::class, 'updateCardDetails']);





Route::post('/manage/images/{id}', [ImageController::class, 'manage_images_store']);

Route::middleware('auth:api')->controller(PassController::class)->group(function () {
    Route::get('/user/get-home-data', 'getHomeCardDetails');
    Route::get('/user/get-barchart-data', 'getBarGraph');
    Route::get('/user/get-wavechart-data', 'getWaveGraph');
});


