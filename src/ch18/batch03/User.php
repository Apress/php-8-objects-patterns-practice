<?php

declare(strict_types=1);

/* listing 18.17 */
namespace popp\ch18\batch03;

class User
{
    private string $pass;
    private ?string $failed;

    public function __construct(private string $name, private string $mail, string $pass)
    {
        if (strlen($pass) < 5) {
            throw new \Exception(
                "Password must have 5 or more letters"
            );
        }

        $this->pass = $pass;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function failed(string $time): void
    {
        $this->failed = $time;
    }
}
