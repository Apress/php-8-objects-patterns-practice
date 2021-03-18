<?php

declare(strict_types=1);

namespace userthing\util;

use userthing\persist\UserStore;


class Validator
{
    public function __construct(private UserStore $store)
    {
    }


/* listing 21.06 */
    public function validateUser(string $mail, string $pass): bool
    {
        // make it always fail
        // return false;
        $user = $this->store->getUser($mail);
        if (is_null($user)) {
            return false;
        }
        $testpass = $user->getPass();
        if ($testpass == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($mail);
        return false;
    }
/* /listing 21.06 */
}
