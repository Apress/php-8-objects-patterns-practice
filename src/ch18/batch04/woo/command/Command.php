<?php

namespace popp\ch18\batch04\woo\command;

use popp\ch18\batch04\woo\base\AppException;
use popp\ch18\batch04\woo\controller\Request;

abstract class Command
{

    private static $STATUS_STRINGS = array (
        'CMD_DEFAULT' => 0,
        'CMD_OK' => 1,
        'CMD_ERROR' => 2,
        'CMD_INSUFFICIENT_DATA' => 3
    );

    private $status = 0;

    final public function __construct()
    {
    }

    public function execute(Request $request)
    {
        $this->status = $this->doExecute($request);
        $request->setCommand($this);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public static function statuses($str = 'CMD_DEFAULT')
    {
        if (isset(self::$STATUS_STRINGS[$str])) {
            return self::$STATUS_STRINGS[$str];
        }
        throw new AppException("unknown status: $str");
    }

    abstract protected function doExecute(Request $request);
}
