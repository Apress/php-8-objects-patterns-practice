<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

abstract class Request
{
    protected array $properties = [];
    protected array $feedback = [];
    protected string $path = "/";
    protected int $cmdstatus = 0;

    public function __construct()
    {
        $this->init();
    }

    abstract public function init(): void;

    abstract public function forward(string $path): void;

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setCmdStatus(int $status): void
    {
        $this->cmdstatus = $status;
    }

    public function getCmdStatus(): int
    {
        return $this->cmdstatus;
    }


    public function getProperty(string $key): mixed
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty(string $key, $val): void
    {
        $this->properties[$key] = $val;
    }

    public function addFeedback(string $msg): void
    {
        array_push($this->feedback, $msg);
    }

    public function getFeedback(): array
    {
        return $this->feedback;
    }

    public function getFeedbackString($separator = "\n"): string
    {
        return implode($separator, $this->feedback);
    }

    public function clearFeedback(): void
    {
        $this->feedback = [];
    }
}
