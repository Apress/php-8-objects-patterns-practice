<?php

/* listing 06.03 */
/* listing 06.10 */
function readParams(string $source): array
{
    $params = [];
    if (preg_match("/\.xml$/i", $source)) {
        // read XML parameters from $source
/* /listing 06.03 */
/* /listing 06.10 */
        $el = simplexml_load_file($source);
        foreach ($el->param as $param) {
            $params["$param->key"] = "$param->val";
        }
/* listing 06.03 */
/* listing 06.10 */
    } else {
        // read text parameters from $source
/* /listing 06.03 */
/* /listing 06.10 */
        $fh = fopen($source, 'r');
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
/* listing 06.03 */
/* listing 06.10 */
    }
    return $params;
}

function writeParams(array $params, string $source): void
{
/* /listing 06.03 */
/* /listing 06.10 */
    $fh = fopen($source, 'w');
/* listing 06.03 */
/* listing 06.10 */
    if (preg_match("/\.xml$/i", $source)) {
        // write XML parameters to $source
/* /listing 06.03 */
/* /listing 06.10 */
        fputs($fh, "<params>\n");
        foreach ($params as $key => $val) {
            fputs($fh, "\t<param>\n");
            fputs($fh, "\t\t<key>$key</key>\n");
            fputs($fh, "\t\t<val>$val</val>\n");
            fputs($fh, "\t</param>\n");
        }
        fputs($fh, "</params>\n");
/* listing 06.03 */
/* listing 06.10 */
    } else {
        // write text parameters to $source
/* /listing 06.03 */
/* /listing 06.10 */
        foreach ($params as $key => $val) {
            fputs($fh, "$key:$val\n");
        }
/* listing 06.03 */
/* listing 06.10 */
    }
/* /listing 06.03 */
/* /listing 06.10 */
    fclose($fh);
/* listing 06.03 */
/* listing 06.10 */
}
