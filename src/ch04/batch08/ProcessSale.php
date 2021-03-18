<?php

declare(strict_types=1);

namespace popp\ch04\batch08;

class ProcessSale
{
    private array $callbacks;

    public function registerCallback($callback): void
    {
        if (! is_callable($callback)) {
            throw new \Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }

    public function sale($product): void
    {
        print "{$product->name}: processing \n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
