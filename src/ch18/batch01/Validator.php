<?php

declare(strict_types=1);

namespace popp\ch18\batch01;

/* listing 18.03 */
class Validator
{

    public function __construct(private UserStore $store)
    {
    }

    public function validateUser(string $mail, string $pass): bool
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
}
/* /listing 18.03 */
