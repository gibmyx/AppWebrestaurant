<?php

declare(strict_types=1);

namespace Tests\Feature\src\Restaurant\Reservations;

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

final class ReservationGetControllerTest extends TestCase
{
    use DatabaseTransactions;

    private $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        parent::setUp();
    }

    /**
     * @test
     */
    public function this_should_get_the_reservation_for_user_exists()
    {

    }

}
