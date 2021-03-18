<?php

namespace popp\ch18\batch04\woo\command;

use popp\ch18\batch04\woo\controller\Request;

class DefaultCommand2 extends Command
{
    protected function doExecute(Request $request)
    {
        $request->addFeedback("Welcome to WOO");
    }
}
