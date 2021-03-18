<?php

declare(strict_types=1);

namespace popp\ch05\batch06;

class Delegator
{
    private OtherShop $thirdpartyShop;

    public function __construct()
    {
        $this->thirdpartyShop = new OtherShop();
    }

/* listing 05.59 */
    public function __call(string $method, array $args): mixed
    {
        if (method_exists($this->thirdpartyShop, $method)) {
            return $this->thirdpartyShop->$method();
        }
    }
/* /listing 05.59 */
}
