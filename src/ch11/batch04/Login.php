<?php

declare(strict_types=1);

namespace popp\ch11\batch04;

class Login
{
    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS = 2;
    public const LOGIN_ACCESS = 3;

    private array $status = [];

/* listing 11.23 */
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        switch (rand(1, 3)) {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
                break;
        }

        Logger::logIP($user, $ip, $this->getStatus());
/* /listing 11.23 */
/* listing 11.24 */
        if (! $isvalid) {
            Notifier::mailWarning(
                $user,
                $ip,
                $this->getStatus()
            );
        }
/* /listing 11.24 */
/* listing 11.23 */

        return $isvalid;
    }
/* /listing 11.23 */

    private function setStatus(int $status, string $user, string $ip): void
    {
        $this->status = [ $status, $user, $ip ];
    }

    public function getStatus(): array
    {
        return $this->status;
    }
}
