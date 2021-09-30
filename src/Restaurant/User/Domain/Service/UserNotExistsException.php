<?php

declare(strict_types=1);

namespace AppRestaurant\Restaurant\User\Domain\Service;

use Throwable;

final class UserNotExistsException extends \Exception
{
    const NOT_FOUND = 404;
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("User not exists", self::NOT_FOUND, $previous);
    }
}
