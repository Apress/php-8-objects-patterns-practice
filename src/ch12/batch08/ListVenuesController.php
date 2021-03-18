<?php

declare(strict_types=1);

namespace popp\ch12\batch08;

class ListVenuesController extends PageController
{
    public function process(): void
    {
        $request = $this->getRequest();

        try {
            $this->render(__DIR__ . '/view/list_venues.php', $request);
            return;
        } catch (Exception $e) {
            $this->render(__DIR__ . '/view/error.php', $request);
        }
    }
}
