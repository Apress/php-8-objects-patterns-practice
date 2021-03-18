<?php

declare(strict_types=1);

namespace popp\ch10\batch07;

/* listing 10.32 */
class MainProcess extends ProcessRequest
{
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": doing something useful with request\n";
    }
}
