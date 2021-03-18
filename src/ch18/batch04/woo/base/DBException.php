<?php

declare(strict_types=1);

namespace popp\ch18\batch04\woo\base;

class DBException extends \Exception
{
    private $error;
    public function __construct(DB_Error $error)
    {
        parent::__construct($error->getMessage(), $error->getCode());
        $this->error = $db_error;
    }

    public function getErrorObject()
    {
        return $this->error;
    }
}
