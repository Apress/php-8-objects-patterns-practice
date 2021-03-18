<?php
/**
 * @license   http://www.example.com Borsetshire Open License
 * @package quiztools
 */

/**
 * includes
 */
require_once("quizobjects/User.php");

/**
 * @package quiztools
 * Handles user access
 */
class AccessManager
{
    public function login($user, $pass)
    {
        $ret = new User($user);
        return $ret;
    }

    public function getError()
    {
        return "move along now, nothing to see here";
    }
}

/**
 * @package quiztools
 */
class ReceiverFactory
{
    public static function getAccessManager()
    {
        return new AccessManager();
    }
}
