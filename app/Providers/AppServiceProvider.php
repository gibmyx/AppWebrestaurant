<?php

namespace App\Providers;

use AppRestaurant\Restaurant\Shared\Domain\Bus\Event\EventBus;
use AppRestaurant\Restaurant\Shared\Infrastructure\Bus\EventBusLaravel;
use Illuminate\Support\ServiceProvider;
use function Lambdish\Phunctional\each;

class AppServiceProvider extends ServiceProvider
{

    private $wiringObjects = [
        EventBus::class => EventBusLaravel::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        each(function ($concrete, $abstract) {
            $this->app->bind(
                $abstract,
                $concrete
            );
        }, $this->wiringObjects);
    }
}
