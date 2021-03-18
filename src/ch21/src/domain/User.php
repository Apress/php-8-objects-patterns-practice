<?php

declare(strict_types=1);

namespace userthing\domain;

class User
{
    private $pass;
    private $failed;
    private $name;
    private $mail;

    public function __construct(string $name, string $mail, string $pass)
    {
        if (strlen($pass) < 5) {
            throw new \Exception(
                "Password must have 5 or more letters"
            );
        }
        $this->name = $name;
        $this->mail = $mail;
        $this->pass = $pass;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function failed(string $time)
    {
        $this->failed = $time;
    }
}
