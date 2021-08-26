<?php

declare(strict_types=1);


namespace AppRestaurant\Restaurant\Reservations\Domain\Entity;


use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationCreatedAt;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationDate;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationHours;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationId;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationPeoples;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationTableId;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationUpdatedAt;

final class Reservation
{

    private $id;
    private $tableId;
    private $peoples;
    private $date;
    private $createdAt;
    private $updatedAt;

    private function __construct(
        ReservationId        $id,
        ReservationTableId   $tableId,
        ReservationPeoples   $peoples,
        ReservationDate      $date,
        ReservationCreatedAt $createdAt,
        ReservationUpdatedAt $updatedAt
    )
    {
        $this->id = $id;
        $this->tableId = $tableId;
        $this->peoples = $peoples;
        $this->date = $date;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        ReservationId        $id,
        ReservationTableId   $tableId,
        ReservationPeoples   $peoples,
        ReservationDate      $date
    ): self
    {
        return new self(
            $id,
            $tableId,
            $peoples,
            $date,
            new ReservationCreatedAt(),
            new ReservationUpdatedAt()
        );
    }

    public function id(): ReservationId
    {
        return $this->id;
    }

    public function tableId(): ReservationTableId
    {
        return $this->tableId;
    }

    public function peoples(): ReservationPeoples
    {
        return $this->peoples;
    }

    public function date(): ReservationDate
    {
        return $this->date;
    }

    public function createdAt(): ReservationCreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): ReservationUpdatedAt
    {
        return $this->updatedAt;
    }
}
