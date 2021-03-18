<?php

declare(strict_types=1);

namespace popp\ch06\batch03;

/* listing 06.04 */
abstract class ParamHandler
{
    protected array $params = [];

    public function __construct(protected string $source)
    {
    }

    public function addParam(string $key, string $val): void
    {
        $this->params[$key] = $val;
    }

    public function getAllParams(): array
    {
        return $this->params;
    }
/* /listing 06.04 */
    protected function openSource(string $flag): mixed
    {
        $fh = @fopen($this->source, $flag);
        if (empty($fh)) {
            throw new Exception("could not open: $this->source!");
        }
        return $fh;
    }
/* listing 06.04 */

    public static function getInstance(string $filename): ParamHandler
    {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);
    }

    abstract public function write(): void;
    abstract public function read(): void;
}
