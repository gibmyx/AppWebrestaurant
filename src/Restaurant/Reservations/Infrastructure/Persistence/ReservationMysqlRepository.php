<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\Reservations\Infrastructure\Persistence;

use AppRestaurant\Restaurant\Reservations\Domain\Contract\ReservationRepository;
use AppRestaurant\Restaurant\Reservations\Domain\Entity\Reservation;
use Illuminate\Support\Facades\DB;

final class ReservationMysqlRepository implements ReservationRepository
{

    public function create(Reservation $reservation): void
    {
        DB::table('reservation')
            ->insert([
                'id'            => $reservation->id()->value(),
                'table_id'      => $reservation->tableId()->value(),
                'user_id'      => $reservation->userId()->value(),
                'peoples'       => $reservation->peoples()->value(),
                'date'          => $reservation->date()->value(),
                'created_at'    => $reservation->createdAt()->value(),
                'updated_at'    => $reservation->updatedAt()->value()
            ]);
    }

    public function searcherList(array $clause): array
    {
        $query = DB::table(Reservation::TABLE);
        $query = (new ReservationMySqlFilters($query))($clause);
        return $query->get()->toArray();
    }
}
