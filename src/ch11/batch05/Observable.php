<?php

declare(strict_types=1);

namespace popp\ch11\batch05;

/* listing 11.25 */
interface Observable
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}
