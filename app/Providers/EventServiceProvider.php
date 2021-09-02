<?php

namespace App\Providers;

use App\Events\PruebaEvent;
use App\Listeners\PruebaListener;
use AppRestaurant\Restaurant\Reservations\Application\Subscriber\ReservationCreatedToCreateConfirmation;
use AppRestaurant\Restaurant\Reservations\Domain\Event\ReservationCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PruebaEvent::class => [
            PruebaListener::class,
        ],
        ReservationCreated::class => [
            ReservationCreatedToCreateConfirmation::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
