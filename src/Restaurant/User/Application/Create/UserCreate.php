<?php

declare(strict_types=1);


namespace AppRestaurant\Restaurant\User\Application\Create;


use AppRestaurant\Restaurant\User\Domain\Contract\UserRepository;
use AppRestaurant\Restaurant\User\Domain\Entity\User;
use AppRestaurant\Restaurant\User\Domain\Validation\UserExists;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserEmail;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserName;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserOrigin;
use AppRestaurant\Restaurant\User\Domain\ValueObject\UserPassword;

final class UserCreate
{
    private $userExists;
    private $repository;

    public function __construct(
        UserRepository $repository
    )
    {
        $this->userExists = new UserExists($repository);
        $this->repository = $repository;
    }

    public function __invoke(UserCreateRequest $request)
    {
        $use = User::create(
            new UserName($request->name()),
            new UserEmail($request->email()),
            new UserPassword($request->password()),
            new UserOrigin($request->origin())
        );
        ($this->userExists)($use->email());

        $this->repository->create($use);
    }


}
