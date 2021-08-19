<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\Tables\Domain\Entity;

use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableCreatedAt;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableDescription;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableId;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableMaxPeople;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableMinPeople;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableNumber;
use AppRestaurant\Restaurant\Tables\Domain\ValueObject\TableUpdatedAt;

final class Table
{
    const TABLE = 'tables';

    private $id;
    private $number;
    private $maxPeople;
    private $minPeople;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        TableId          $id,
        TableNumber      $number,
        TableMaxPeople   $maxPeople,
        TableMinPeople   $minPeople,
        TableDescription $description,
        TableCreatedAt   $createdAt,
        TableUpdatedAt   $updatedAt
    )
    {
        $this->id = $id;
        $this->number = $number;
        $this->maxPeople = $maxPeople;
        $this->minPeople = $minPeople;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        TableId          $id,
        TableNumber      $number,
        TableMaxPeople   $maxPeople,
        TableMinPeople   $minPeople,
        TableDescription $description
    ): self
    {
        return new self(
            $id,
            $number,
            $maxPeople,
            $minPeople,
            $description,
            new TableCreatedAt(),
            new TableUpdatedAt()
        );
    }

    public function id(): TableId
    {
        return $this->id;
    }

    public function number(): TableNumber
    {
        return $this->number;
    }

    public function maxPeople(): TableMaxPeople
    {
        return $this->maxPeople;
    }

    public function minPeople(): TableMinPeople
    {
        return $this->minPeople;
    }

    public function description(): TableDescription
    {
        return $this->description;
    }

    public function createdAt(): TableCreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): TableUpdatedAt
    {
        return $this->updatedAt;
    }

}
