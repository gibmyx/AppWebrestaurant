<?php

declare(strict_types=1);

namespace Apps\Backend\restaurant\Tables\Config\providers;

use AppRestaurant\Restaurant\Tables\Domain\Contract\TableRepository;
use AppRestaurant\Restaurant\Tables\Infrastructure\Persistence\TablyMysqlRepository;
use Illuminate\Support\ServiceProvider;

use function Lambdish\Phunctional\each;

final class TableServiceProvider extends ServiceProvider
{
    private $wiringObjects = [
        TableRepository::class =>TablyMysqlRepository::class
    ];

    public function register()
    {
        //
    }


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
