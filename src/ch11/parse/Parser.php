<?php

declare(strict_types=1);

namespace popp\ch11\parse;

abstract class Parser
{
    protected $debug = false;
    protected $discard = false;
    protected $name;

    public function __construct(string $name = null)
    {
        if (is_null($name)) {
            $this->name = get_class($this);
        } else {
            $this->name = $name;
        }
    }

    public function setHandler(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function invokeHandler(Scanner $scanner)
    {
        if (! empty($this->handler)) {
            if ($this->debug) {
                $this->report("calling handler: " . get_class($this->handler));
            }
            $this->handler->handleMatch($this, $scanner);
        }
    }

    public function report($msg)
    {
        print "<{$this->name}> " . get_class($this) . ": $msg\n";
    }

    public function push(Scanner $scanner)
    {
        if ($this->debug) {
            $this->report("pushing {$scanner->token()}");
        }
        $scanner->pushResult($scanner->token());
    }

    public function scan(Scanner $scanner)
    {
        $ret = $this->doScan($scanner);
        if ($ret && ! $this->discard && $this->term()) {
            $this->push($scanner);
        }
        if ($ret) {
            $this->invokeHandler($scanner);
        }
        if ($this->debug) {
            $this->report("::scan returning $ret");
        }
        if ($this->term() && $ret) {
            $scanner->nextToken();
            $scanner->eatWhiteSpace();
        }

        return $ret;
    }

    public function discard()
    {
        $this->discard = true;
    }

    abstract public function trigger(Scanner $scanner);

    abstract protected function doScan(Scanner $scan);

    public function term(): bool
    {
        return true;
    }
}
