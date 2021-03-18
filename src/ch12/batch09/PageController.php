<?php

declare(strict_types=1);

namespace popp\ch12\batch09;

use popp\ch12\batch06\Registry;
use popp\ch12\batch06\Request;
use popp\ch12\batch06\HttpRequest;
use popp\ch12\batch08\CliRequest;

abstract class PageController
{
    abstract public function process(): void;

    public function init(): void
    {
        $reg = Registry::instance();

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $reg->setRequest($request);
    }

    public function forward(string $resource): void
    {
        $request = $this->getRequest();
        $request->forward($resource);
    }

/* listing 12.40 */
    public function render(string $resource, Request $request): void
    {
        $vh = new ViewHelper();
        // now the template will have the $vh variable
        include($resource);
    }
/* /listing 12.40 */

    public function getRequest(): Request
    {
        $reg = Registry::instance();
        return $reg->getRequest();
    }
}
