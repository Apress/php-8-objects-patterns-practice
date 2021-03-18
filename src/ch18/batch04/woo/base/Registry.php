<?php

namespace popp\ch18\batch04\woo\base;

abstract class Registry
{
    abstract protected function get($key);
    abstract protected function set($key, $val);
}
