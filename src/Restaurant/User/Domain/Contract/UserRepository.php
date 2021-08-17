<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\User\Domain\Contract;

use AppRestaurant\Restaurant\User\Domain\Entity\User;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserEmail;

interface UserRepository
{
    public function create(User $user): void;

    public function existsEmail(UserEmail $email): bool;

}
