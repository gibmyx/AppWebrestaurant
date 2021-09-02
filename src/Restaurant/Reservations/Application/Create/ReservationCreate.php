<?php

declare(strict_types=1);


namespace AppRestaurant\Restaurant\Reservations\Application\Create;


use App\Events\PruebaEvent;
use AppRestaurant\Restaurant\Reservations\Domain\Contract\ReservationRepository;
use AppRestaurant\Restaurant\Reservations\Domain\Entity\Reservation;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationDate;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationId;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationPeoples;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationTableId;
use AppRestaurant\Restaurant\Reservations\Domain\ValueObject\ReservationUserId;
use AppRestaurant\Restaurant\Shared\Domain\Bus\Event\EventBus;

final class ReservationCreate
{
    private $repository;
    private $bus;

    public function __construct(
        ReservationRepository $repository,
        EventBus $bus
    )
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(ReservationCreateRequest $request)
    {
        $reservation = Reservation::create(
            new ReservationId($request->id()),
            new ReservationTableId($request->tableId()),
            new ReservationUserId($request->userId()),
            new ReservationPeoples($request->people()),
            new ReservationDate($request->date())
        );

        $event = new PruebaEvent("Gibmyx");

//        $event->execute();


        $this->repository->create($reservation);

        $this->bus->publish(...$reservation->pullDomainEvents());
        dd('stop');
    }

}
