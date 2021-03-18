<?php

declare(strict_types=1);

namespace popp\ch10\batch07;

/* listing 10.33 */
abstract class DecorateProcess extends ProcessRequest
{
    public function __construct(protected ProcessRequest $processrequest)
    {
    }
}
