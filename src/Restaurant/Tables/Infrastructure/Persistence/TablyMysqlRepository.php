<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\Tables\Infrastructure\Persistence;

use AppRestaurant\Restaurant\Tables\Domain\Contract\TableRepository;
use AppRestaurant\Restaurant\Tables\Domain\Entity\Table;
use Illuminate\Support\Facades\DB;

final class TablyMysqlRepository implements TableRepository
{

    public function create(Table $table): void
    {
        DB::table(Table::TABLE)
            ->insert([
                'id' => $table->id()->value(),
                'number' => $table->number()->value(),
                'max_people' => $table->maxPeople()->value(),
                'min_people' => $table->minPeople()->value(),
                'description' => $table->description()->value(),
                'created_at' => $table->createdAt()->value(),
                'updated_at' => $table->updatedAt()->value(),
            ]);
    }
}
