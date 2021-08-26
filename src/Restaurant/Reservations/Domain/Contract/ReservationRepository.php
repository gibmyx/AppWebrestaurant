<?php

declare(strict_types=1);


namespace AppRestaurant\Restaurant\Reservations\Domain\Contract;


use AppRestaurant\Restaurant\Reservations\Domain\Entity\Reservation;

interface ReservationRepository
{
    public function create(Reservation $reservation): void;
}
