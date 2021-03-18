<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

class HttpRequest extends Request
{
    public function init(): void
    {
        // we're conveniently ignoring POST/GET/etc distinctions
        // don't do that in the real world!
        $this->properties = $_REQUEST;
        $this->path = $_SERVER['PATH_INFO'];
        $this->path = (empty($this->path)) ? "/" : $this->path;
    }

/* listing 12.29 */

    // HttpRequest

    public function forward(string $path): void
    {
        header("Location: {$path}");
        exit;
    }
/* /listing 12.29 */
}
