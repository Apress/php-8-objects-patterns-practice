<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class SequenceParse extends CollectionParse
{

    public function trigger(Scanner $scanner)
    {
        if (empty($this->parsers)) {
            return false;
        }
        return $this->parsers[0]->trigger($scanner);
    }
 
    protected function doScan(Scanner $scanner): bool
    {
        $s_copy = clone $scanner;
        foreach ($this->parsers as $parser) {
            if (
                ! ( $parser->trigger($s_copy) &&
                    $scan = $parser->scan($s_copy))
            ) {
                return false;
            }
        }
        $scanner->updateToMatch($s_copy);
        return true;
    }
}
