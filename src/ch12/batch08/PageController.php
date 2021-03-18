<?php

declare(strict_types=1);

namespace popp\ch12\batch08;

use popp\ch12\batch06\Registry;
use popp\ch12\batch06\Request;
use popp\ch12\batch06\HttpRequest;
use popp\ch12\batch08\CliRequest;

/* listing 12.35 */
abstract class PageController
{
    private Registry $reg;

    abstract public function process(): void;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public function init(): void
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $this->reg->setRequest($request);
    }

    public function forward(string $resource): void
    {
        $request = $this->getRequest();
        $request->forward($resource);
    }

    public function render(string $resource, Request $request): void
    {
        include($resource);
    }

    public function getRequest(): Request
    {
        return $this->reg->getRequest();
    }
}
/* /listing 12.35 */
