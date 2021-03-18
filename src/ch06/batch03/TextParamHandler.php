<?php

declare(strict_types=1);

namespace popp\ch06\batch03;

/* listing 06.06 */
class TextParamHandler extends ParamHandler
{

    public function write(): void
    {
        // write text
        // using $this->params
/* /listing 06.06 */
        $fh = $this->openSource('w');
        foreach ($this->params as $key => $val) {
            fputs($fh, "$key:$val\n");
        }
        fclose($fh);
/* listing 06.06 */
    }

    public function read(): void
    {
        // read text
        // and populate $this->params
/* /listing 06.06 */
        $lines = file($this->source);
        foreach ($lines as $line) {
            $line = trim($line);
            list( $key, $val ) = explode(':', $line);
            $this->params[$key] = $val;
        }
/* listing 06.06 */
    }
}
