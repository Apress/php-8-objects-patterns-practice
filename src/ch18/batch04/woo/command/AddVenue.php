<?php

namespace popp\ch18\batch04\woo\command;

use popp\ch18\batch04\woo\domain\Venue;
use popp\ch18\batch04\woo\controller\Request;

class AddVenue extends Command
{
    protected function doExecute(Request $request)
    {
        $name = $request->getProperty("venue_name");
        if (is_null($name)) {
            $request->addFeedback("no name provided");
            return self::statuses('CMD_INSUFFICIENT_DATA');
        } else {
            $venue_obj = new Venue(null, $name);
            $request->setObject('venue', $venue_obj);
            $venue_obj->finder()->insert($venue_obj);
            $request->addFeedback("'$name' added ({$venue_obj->getId()})");
            return self::statuses('CMD_OK');
        }
        return self::statuses('CMD_DEFAULT');
    }
}
