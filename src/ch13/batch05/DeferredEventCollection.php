<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class DeferredEventCollection extends EventCollection
{
    private \PDOStatement $stmt;
    private array $valueArray;
    private bool $run = false;

    public function __construct(DomainObjectFactory $dofact, private \PDOStatement $stmt, private array $valueArray)
    {
        parent::__construct(null, $dofact);
    }

    public function notifyAccess(): void
    {
        if (! $this->run) {
            $this->stmt->execute($this->valueArray);
            $this->raw = $this->stmt->fetchAll();
            $this->total = count($this->raw);
        }

        $this->run = true;
    }
}
