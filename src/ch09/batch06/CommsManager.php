<?php

declare(strict_types=1);

namespace popp\ch09\batch06;

/* listing 09.17 */
class CommsManager
{
    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }
}
