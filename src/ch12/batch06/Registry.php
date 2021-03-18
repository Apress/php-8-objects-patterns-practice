<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

class Registry
{
    private array $values = [];
    private static $instance = null;
    private ?Request $request = null;
    private ?Conf $conf = null;
    private ?Conf $commands = null;
    private ?ApplicationHelper $applicationHelper = null;
    private ?\PDO $pdo = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function reset(): void
    {
        self::$instance = null;
    }

    // must be initialized by some smarter component
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("No Request set");
        }

        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setConf(Conf $conf): void
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands): void
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        return $this->commands;
    }

    public function getDSN(): string
    {
        $conf = $this->getConf();

        return $conf->get("dsn");
    }

    public function getPdo(): \PDO
    {
        if (is_null($this->pdo)) {
            $dsn = $this->getDSN();

            if (is_null($dsn)) {
                throw new AppException("No DSN");
            }

            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }
}
