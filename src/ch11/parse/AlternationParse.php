<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class AlternationParse extends CollectionParse
{

    public function trigger(Scanner $scanner): bool
    {
        foreach ($this->parsers as $parser) {
            if ($parser->trigger($scanner)) {
                return true;
            }
        }
        return false;
    }

    protected function doScan(Scanner $scanner): bool
    {
        $type = $scanner->tokenType();
        foreach ($this->parsers as $parser) {
            $s_copy = clone $scanner;
            if (
                $type == $parser->trigger($s_copy) &&
                 $parser->scan($s_copy)
            ) {
                 $scanner->updateToMatch($s_copy);
                 return true;
            }
        }
        return false;
    }
}
