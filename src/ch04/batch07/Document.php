<?php

declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.59 */
/* listing 04.55 */
class Document extends DomainObject
{
/* /listing 04.55 */
    public static function getGroup(): string
    {
        return "document";
    }
/* listing 04.55 */
}
