<?php

declare(strict_types=1);

namespace popp\ch04\batch10;

class Conf
{
    private \SimpleXMLElement $xml;
    private \SimpleXMLElement $lastmatch;

/* listing 04.63 */
    public function __construct(private string $file)
    {
        if (! file_exists($file)) {
            throw new \Exception("file '{$file}' does not exist");
        }
        $this->xml = simplexml_load_file($file);
    }
/* /listing 04.63 */

/* listing 04.64 */
    public function write(): void
    {
        if (! is_writeable($this->file)) {
            throw new \Exception("file '{$this->file}' is not writeable");
        }
        print "{$this->file} is apparently writeable\n";
        file_put_contents($this->file, $this->xml->asXML());
    }
/* /listing 04.64 */

    public function get(string $str): string
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $value): void
    {
        if (! is_null($this->get($key))) {
            $this->lastmatch[0] = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}
