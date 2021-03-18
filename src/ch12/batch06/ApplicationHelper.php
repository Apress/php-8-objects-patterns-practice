<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

class ApplicationHelper
{
    private string $config = __DIR__ . "/data/woo_options.ini";
    private Registry $reg;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public function init(): void
    {
        $this->setupOptions();

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $this->reg->setRequest($request);
    }

/* listing 12.31 */
    private function setupOptions(): void
    {
        //...
/* /listing 12.31 */
        if (! file_exists($this->config)) {
            throw new AppException("Could not find options file");
        }

        $options = parse_ini_file($this->config, true);
        $conf = new Conf($options['config']);
        $this->reg->setConf($conf);

/* listing 12.31 */
        $vcfile = $conf->get("viewcomponentfile");
        $cparse = new ViewComponentCompiler();

        $commandandviewdata = $cparse->parseFile($vcfile);
        $this->reg->setCommands($commandandviewdata);
    }
/* /listing 12.31 */
}
