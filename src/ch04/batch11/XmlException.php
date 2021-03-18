<?php

declare(strict_types=1);

namespace popp\ch04\batch11;

/* listing 04.69 */
class XmlException extends \Exception
{
    public function __construct(private \LibXmlError $error)
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    public function getLibXmlError(): \LibXmlError
    {
        return $this->error;
    }
}
/* /listing 04.69 */
