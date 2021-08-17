<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\User\Infrastructure\Persistence;

use AppRestaurant\Restaurant\User\Domain\Contract\UserRepository;
use AppRestaurant\Restaurant\User\Domain\Entity\User;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserEmail;
use Illuminate\Support\Facades\DB;

final class UserMysqlRepository implements UserRepository
{

    public function create(User $user): void
    {
        DB::table(User::TABLE_NAME)
            ->insert([
                'name' => $user->name()->value(),
                'email' => $user->email()->value(),
                'password' => $user->password()->value(),
                'origin' => $user->origin()->value(),
            ]);
    }

    public function existsEmail(UserEmail $email): bool
    {
        return DB::table(User::TABLE_NAME)
            ->where('email', $email->value())
            ->get()->count() > 0;
    }
}
