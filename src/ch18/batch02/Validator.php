<?php

declare(strict_types=1);

namespace popp\ch18\batch02;

class Validator
{
    public function __construct(private UserStore $store)
    {
    }

/* listing 18.21 */
    public function validateUser($mail, $pass): bool
    {
        if (! is_array($user = $this->store->getUser($mail))) {
            return false;
        }

        if ($user['pass'] == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($mail);

        return false;
    }
/* /listing 18.21 */
}
