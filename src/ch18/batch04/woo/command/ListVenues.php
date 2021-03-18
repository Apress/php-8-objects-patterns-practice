<?php

namespace popp\ch18\batch04\woo\command;

use popp\ch18\batch04\woo\domain\Venue;
use popp\ch18\batch04\woo\controller\Request;

class ListVenues extends Command
{
    protected function doExecute(Request $request)
    {
        $collection = \woo\domain\Venue::findAll();
        $request->setObject('venues', $collection);
        return self::statuses('CMD_OK');
    }
}
