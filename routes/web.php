<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GooglePassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoyalityController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubUserController;
use App\Models\Pass;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/update_to_temp', function () {
    $passes = Pass::all();
    $count = 0;
    foreach ($passes as $pass) {
        $pass->update([
            'is_temp' => true,
            'pass_name' => "template " . $count++
        ]);
    }

    $passes = Pass::all();
    dd($passes = Pass::all());
});

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/cookie-policy', [HomeController::class, 'cookies'])->name('cookies');
Route::get('/help-center', [HomeController::class, 'helpPage'])->name('help');
Route::get('/solutions', [HomeController::class, 'solutions'])->name('solutions');
Route::get('/pricing/view', [HomeController::class, 'pricing'])->name('pricing.view');

Route::get('customer/create', [CustomerController::class, 'create'])->name('cst.create');
Route::post('customer/store', [CustomerController::class, 'store'])->name('cst.store');
Route::get('customer/edit/{id?}', [CustomerController::class, 'view'])->name('cst.edit');
Route::post('customer/update/{id?}', [CustomerController::class, 'update'])->name('cst.update');

Route::get('subusers/index', [SubUserController::class, 'index'])->name('subusers.index');
Route::get('subusers/create', [SubUserController::class, 'create'])->name('subusers.create');
Route::post('subuser/store', [SubUserController::class, 'store'])->name('subuser.store');
Route::get('subuser/edit/{id?}', [SubUserController::class, 'edit'])->name('subuser.edit');
Route::post('subuser/update/{id?}', [SubUserController::class, 'update'])->name('subuser.update');
Route::get('subuser/delete/{id}', [SubUserController::class, 'delete'])->name('subuser.delete');
Route::post('update/profile', [SubUserController::class, 'updateProfile'])->name('update.user_profile');

Route::get('/make/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/make/payment', [PaymentController::class, 'makePayment'])->name('payment.make');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/settings/index', [ProfileController::class, 'edit'])->name('settings.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('pass/store', [PassController::class, 'store'])->name('pass.store');

Route::get('/loyality/create/{type?}', [LoyalityController::class, 'create'])->name('loyality.create');
Route::get('/program/view', [LoyalityController::class, 'viewSingle'])->name('loyality.singleView');
Route::post('/pass/{id}', [LoyalityController::class, 'createPass'])->name('store.pass');
Route::get('/start/with-pass', [LoyalityController::class, 'start'])->name('loyality.start');
Route::get('/start/design/{type?}', [LoyalityController::class, 'start_design'])->name('loyality.start_design');
Route::any('/wallet-update/{segments?}', [LoyalityController::class, 'walletUrl'])->name('wallet-update');

Route::any('/pass-update', [LoyalityController::class, 'pass_update'])->name('pass_update');
Route::any('pass-update/v1/passes/{passTypeIdentifier}/{serialNumber}', [LoyalityController::class, 'get_updated_data'])->name('pass_update.passes');
Route::any('pass-update/v1/devices/{deviceLibraryIdentifier}/registrations/{passTypeIdentifier}', [LoyalityController::class, 'pass_update_with_deviceId'])->name('pass_update_with_deviceId.passes');
Route::any('pass-update/v1/devices/{deviceLibraryIdentifier}/registrations/{passTypeIdentifier}/{serialNumber}', [LoyalityController::class, 'register_pass'])->name('pass_update.devices');
Route::any('pass-update/v1/log', [LoyalityController::class, 'log_error'])->name('pass_update.log');

Route::get('/manage/program/{id?}', [CouponController::class, 'manage'])->name('manage.program')->middleware(['auth', 'image.count.check']);
Route::post('/delete/program/{id?}', [CouponController::class, 'delete'])->name('delete.program')->middleware(['auth']);
Route::get('/install/coupon/{id?}', [CouponController::class, 'generateCard'])->name('install.card');

Route::get('/manage/images/{id}', [ImageController::class, 'manage_images'])->name('manage.image');
Route::post('/manage/images/{id}', [ImageController::class, 'manage_images_store'])->name('manage.image.store');

Route::get('/plans/subscription', [SubscriptionController::class, 'show'])->name('plan.show');
Route::get('/plans/refund', [SubscriptionController::class, 'refund'])->name('plan.refund');
Route::post('/plans/refund_check', [SubscriptionController::class, 'refund_check'])->name('plan.refund_check');
Route::post('/plans/subscription/detail', [SubscriptionController::class, 'detail'])->name('plan.detail');
Route::get('/plans/subscription/failed', [SubscriptionController::class, 'fail'])->name('plan.fail');
Route::any('/plans/subscription/{plan}/{user}', [SubscriptionController::class, 'subscribe'])->name('plan.sub');
Route::any('/plans/refund_callback/{subscription}/{user}', [SubscriptionController::class, 'refund_callback'])->name('plan.refund_callback');
Route::post('/plans/payment/{plan}', [SubscriptionController::class, 'payment'])->name('plan.pay');
Route::any('/paytabs_callback', [SubscriptionController::class, 'paytabs_callback'])->name('plan.callback');

########################################Location###############################################
Route::prefix("location")->group(function () {
    Route::get("/", [LocationController::class, "index"])->name("location.index");
    Route::get("/read", [LocationController::class, "read"])->name("location.read");
    Route::get("/readById", [LocationController::class, "readById"])->name("location.readById");
    Route::get("/store", [LocationController::class, "store"])->name("location.store");
    Route::get("/remove/{id?}", [LocationController::class, "remove"])->name("location.remove");
    Route::get("/readbyid/{id?}", [LocationController::class, "readById"])->name("location.readbyid");
});


########################################Admin###############################################
Route::prefix("admin")->group(function () {
    Route::get("/login", [AuthController::class, "index"])->name("login.index");
    Route::post("/login", [AuthController::class, "store"])->name("login.store");

    Route::middleware('isAdmin')->group(function () {
        Route::get("/dashboard", [AuthController::class, "dashboard"])->name("admin.dashboard");

        Route::get("/library/create", [LibraryController::class, "index"])->name("library.create");
        Route::get("/library/view", [LibraryController::class, "view_library"])->name("library.view");
        Route::post("/library/delete", [LibraryController::class, "delete_library"])->name("library.delete");

        ########################################Users###############################################
        Route::prefix("user")->group(function () {
            Route::get("/", [UserController::class, "index"])->name("user.index");
            // Route::get("/read", [UserController::class, "read"])->name("user.read");
            // Route::get("/store", [UserController::class, "store"])->name("user.store");
            // Route::get("/readbyid/{id?}", [UserController::class, "readById"])->name("user.readbyid");
            Route::get('/view/{id}', [UserController::class, 'view'])->name('user.view');
            Route::get('/history/payment', [UserController::class, 'payment_history'])->name('admin.payment_history');
            Route::get('/history/subscription', [UserController::class, 'subscription_histories'])->name('admin.subscription_history');
            Route::get('/support/enquiries', [UserController::class, 'enquires'])->name('admin.enquires');
        });
    });
});



Route::post("/changeLanguage", [RegisteredUserController::class, "changeLanguage"])->name("change.Language");

Route::get('/change-lang/{lang}', [HomeController::class, 'setlang'])->name('set.lang');
Route::post('/send-support', [HomeController::class, 'sendSupportMail']);

Route::controller(GooglePassController::class)->group(function () {
    Route::get('g-test', 'test');
    Route::get('update-gtest', 'update');
});

Route::controller(PlanController::class)->prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/plans/view', 'index')->name('plans.view');
    Route::patch('/plans/status/update/{id}', 'changeStatus');
    Route::post('/plans/store', 'store')->name('admin.plans.store');
    Route::get('/plan/edit/{plan}', 'edit')->name('admin.plan.edit');
    Route::put('/plan/update/{id}', 'update')->name('admin.plan.update');
});

Route::controller(APIAuthController::class)->group(function () {
    Route::post('/user/update-password', 'updateForgotPassword')->name('user.updatePassword');
});

Route::get('/success', [HomeController::class, 'successPage'])->name('password.success');
require __DIR__ . '/auth.php';
