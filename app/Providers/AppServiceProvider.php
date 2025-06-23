<?php

namespace App\Providers;

use App\Interfaces\API\AuthRepositoryInterface;
use App\Interfaces\API\PassRepositoryInterface;
use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\PaymentTransactionRepositoryInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\API\AuthRepository;
use App\Repositories\API\PassRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PaymentTransactionRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\API\MessageRepositoryInterface;
use App\Repositories\API\MessageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PaymentTransactionRepositoryInterface::class, PaymentTransactionRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(PassRepositoryInterface::class, PassRepository::class);
        $this->app->bind(PlanRepositoryInterface::class, PlanRepository::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
