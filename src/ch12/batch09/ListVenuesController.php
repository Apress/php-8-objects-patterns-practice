<?php

declare(strict_types=1);

namespace popp\ch12\batch09;

class ListVenuesController extends PageController
{
    public function process(): void
    {
        $request = $this->getRequest();
        $this->render(__DIR__ . '/view/list_venues.php', $request);
    }
}
