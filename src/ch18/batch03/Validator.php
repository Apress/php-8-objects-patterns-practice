<?php

declare(strict_types=1);

namespace popp\ch18\batch03;

class Validator
{
    public function __construct(private UserStore $store)
    {
    }


/* listing 18.22 */
    public function validateUser($mail, $pass): bool
    {
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
/* /listing 18.22 */

        /*
        // version broken by shift to User object

        if (! is_array($user = $this->store->getUser($mail))) {
            return false;
        }

        if ($user['pass'] == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($mail);

        return false;
        */
/* listing 18.22 */
    }
/* /listing 18.22 */
}
