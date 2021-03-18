<?php

declare(strict_types=1);

namespace popp\ch04\batch11;

class Runner
{
    public static function run()
    {
        self::init();
    }

    public static function run2()
    {
        self::init2();
    }

    public static function run3()
    {
        self::init3();
    }

/* listing 04.74 */
    public static function init(): void
    {
        try {
            $fh = fopen("/tmp/log.txt", "a");
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
            fputs($fh, "end\n");
            fclose($fh);
        } catch (FileException $e) {
            // permissions issue or non-existent file
            fputs($fh, "file exception\n");
            throw $e;
        } catch (XmlException $e) {
            fputs($fh, "xml exception\n");
            // broken xml
        } catch (ConfException $e) {
            fputs($fh, "conf exception\n");
            // wrong kind of XML file
        } catch (\Exception $e) {
            fputs($fh, "general exception\n");
            // backstop: should not be called
        }
    }
/* /listing 04.74 */

/* listing 04.75 */
    public static function init2(): void
    {
        $fh = fopen("/tmp/log.txt", "a");
        try {
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.not-there.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permissions issue or non-existent file
            fputs($fh, "file exception\n");
            //throw $e;
        } catch (XmlException $e) {
            fputs($fh, "xml exception\n");
            // broken xml
        } catch (ConfException $e) {
            fputs($fh, "conf exception\n");
            // wrong kind of XML file
        } catch (Exception $e) {
            fputs($fh, "general exception\n");
            // backstop: should not be called
        } finally {
            fputs($fh, "end\n");
            fclose($fh);
        }
    }
/* /listing 04.75 */

    public static function init3(): void
    {
/* listing 04.80 */
        try {
            eval("illegal code");
        } catch (\Error $e) {
            print get_class($e) . "\n";
            print $e->getMessage();
        } catch (\Exception $e) {
            // do something with an Exception
        }
/* /listing 04.80 */
    }
}
