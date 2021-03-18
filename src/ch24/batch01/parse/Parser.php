<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.07 */
abstract class Parser
{
    public const GIP_RESPECTSPACE = 1;

    protected bool $respectSpace = false;
    protected static bool $debug = false;
    protected bool $discard = false;
    protected string $name;
    private static int $count = 0;

    public function __construct(string $name = null, array $options = [])
    {
        if (is_null($name)) {
            self::$count++;
            $this->name = get_class($this) . " (" . self::$count . ")";
        } else {
            $this->name = $name;
        }

        if (isset($options[self::GIP_RESPECTSPACE])) {
            $this->respectSpace = true;
        }
    }

    protected function next(Scanner $scanner): void
    {
        $scanner->nextToken();

        if (! $this->respectSpace) {
            $scanner->eatWhiteSpace();
        }
    }

    public function spaceSignificant(bool $bool): bool
    {
        $this->respectSpace = $bool;
    }

    public static function setDebug(bool $bool): void
    {
        self::$debug = $bool;
    }

    public function setHandler(Handler $handler): void
    {
        $this->handler = $handler;
    }

    final public function scan(Scanner $scanner): bool
    {
        if ($scanner->tokenType() == Scanner::SOF) {
            $scanner->nextToken();
        }

        $ret = $this->doScan($scanner);

        if ($ret && ! $this->discard && $this->term()) {
            $this->push($scanner);
        }

        if ($ret) {
            $this->invokeHandler($scanner);
        }

        if ($this->term() && $ret) {
            $this->next($scanner);
        }

        $this->report("::scan returning $ret");

        return $ret;
    }

    public function discard(): void
    {
        $this->discard = true;
    }

    abstract public function trigger(Scanner $scanner): bool;

    public function term(): bool
    {
        return true;
    }

// private/protected

    protected function invokeHandler(Scanner $scanner): void
    {
        if (! empty($this->handler)) {
            $this->report("calling handler: " . get_class($this->handler));
            $this->handler->handleMatch($this, $scanner);
        }
    }

    protected function report($msg): void
    {
        if (self::$debug) {
            print "<{$this->name}> " . get_class($this) . ": $msg\n";
        }
    }
/* listing 24.08 */
    protected function push(Scanner $scanner): void
    {
        $context = $scanner->getContext();
        $context->pushResult($scanner->token());
    }
/* /listing 24.08 */

    abstract protected function doScan(Scanner $scanner): bool;
}
