<?php

declare(strict_types=1);

namespace popp\ch09\batch07;

/* listing 09.21 */
/* listing 09.18 */
class CommsManager
{
    public const BLOGGS = 1;
    public const MEGA = 2;

    public function __construct(private int $mode)
    {
    }

    public function getApptEncoder(): ApptEncoder
    {
        switch ($this->mode) {
            case (self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }

/* /listing 09.18 */
    public function getHeaderText(): string
    {
        switch ($this->mode) {
            case (self::MEGA):
                return "MegaCal header\n";
            default:
                return "BloggsCal header\n";
        }
    }
/* listing 09.18 */
}
