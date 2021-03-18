<?php

namespace popp\ch06\batch01;

/* listing 06.01 */
function readParams(string $source): array
{
    $params = [];
    // read text parameters from $source
/* /listing 06.01 */
    $fh = fopen($source, 'r') or die("problem with $source");
    while (! feof($fh)) {
        $line = trim(fgets($fh));
        if (! preg_match("/:/", $line)) {
            continue;
        }
        list( $key, $val ) = explode(':', $line);
        if (! empty($key)) {
            $params[$key] = $val;
        }
    }
    fclose($fh);

/* listing 06.01 */
    return $params;
}

function writeParams(array $params, string $source): void
{
    // write text parameters to $source
/* /listing 06.01 */
    $fh = fopen($source, 'w') or die("problem with $source");
    foreach ($params as $key => $val) {
        fputs($fh, "$key:$val\n");
    }
    fclose($fh);
/* listing 06.01 */
}
/* /listing 06.01 */
