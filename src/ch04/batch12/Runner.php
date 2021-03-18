<?php

declare(strict_types=1);

namespace popp\ch04\batch12;

/* listing 04.73 */
class Runner
{
/* /listing 04.73 */
    public static function run()
    {
        return Runner::init();
    }

/* listing 04.73 */
    public static function init()
    {
        try {
            $conf = new Conf(__DIR__ . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permissions issue or non-existent file
            throw $e;
        } catch (XmlException $e) {
/* /listing 04.73 */
            return "xml exception";
/* listing 04.73 */
            // broken xml
        } catch (ConfException $e) {
            // wrong kind of XML file
        } catch (\Exception $e) {
            // backstop: should not be called
        }
    }
}
/* /listing 04.73 */
