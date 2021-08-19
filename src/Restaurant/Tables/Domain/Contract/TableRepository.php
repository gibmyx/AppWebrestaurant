<?php

declare(strict_types=1);


namespace AppRestaurant\Restaurant\Tables\Domain\Contract;


use AppRestaurant\Restaurant\Tables\Domain\Entity\Table;

interface TableRepository
{
    public function create(Table $table): void;

}
