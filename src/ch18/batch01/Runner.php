<?php

declare(strict_types=1);

namespace popp\ch18\batch01;

class Runner
{
    public static function run()
    {
/* listing 18.02 */
        $store = new UserStore();
        $store->addUser(
            "bob williams",
            "bob@example.com",
            "12345"
        );
        $store->notifyPasswordFailure("bob@example.com");
        $user = $store->getUser("bob@example.com");
        print_r($user);
/* /listing 18.02 */
    }

    public static function run2()
    {
/* listing 18.04 */
        $store = new UserStore();
        $store->addUser("bob williams", "bob@example.com", "12345");
        $validator = new Validator($store);
        if ($validator->validateUser("bob@example.com", "12345")) {
            print "pass, friend!\n";
        }
/* /listing 18.04 */
    }
}
