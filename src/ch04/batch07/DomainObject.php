<?php

declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.53 */
/* listing 04.57 */
abstract class DomainObject
{
/* /listing 04.53 */
    private string $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

/* listing 04.53 */
    public static function create(): DomainObject
    {
        return new static();
    }
/* /listing 04.53 */

    public static function getGroup(): string
    {
        return "default";
    }
/* listing 04.53 */
}
