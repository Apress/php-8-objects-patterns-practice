<?php

namespace popp\ch18\batch04\woo\view;

use popp\ch18\batch04\woo\base\ApplicationRegistry;

class ViewHelper
{
    public static function getRequest()
    {
        return ApplicationRegistry::getRequest();
    }
}
