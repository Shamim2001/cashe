<?php

namespace App\Providers;

use App\Events\ActivityEvent;
use App\Listeners\ActivityListener;
use App\Models\CashIn;
use App\Models\Loan;
use App\Models\LonerInformation;
use App\Models\User;
use App\Observers\CashInObserver;
use App\Observers\LoanObserver;
use App\Observers\LonerInformationObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class    => [
            SendEmailVerificationNotification::class,
        ],
        ActivityEvent::class => [
            ActivityListener::class,
        ],
    ];

    // Observer
    protected $observers = [
        // Loan::class => [LoanObserver::class],
        // User::class => [UserObserver::class],
        // CashIn::class => [CashInObserver::class],
        // LonerInformation::class => [LonerInformationObserver::class],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents() {
        return false;
    }
}
