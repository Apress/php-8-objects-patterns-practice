<?php

declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.50 */
class User extends DomainObject
{
    public static function create(): User
    {
        return new User();
    }
}
