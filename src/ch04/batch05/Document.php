<?php

declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.51 */
class Document extends DomainObject
{
    public static function create(): Document
    {
        return new Document();
    }
}
