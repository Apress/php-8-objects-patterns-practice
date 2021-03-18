<?php

declare(strict_types=1);

namespace popp\ch11\batch08;

class Runner
{
    public static function run()
    {
/* listing 11.45 */
        $main_army = new Army();
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCanonUnit());
        $main_army->addUnit(new Cavalry());

        $textdump = new TextDumpArmyVisitor();
        $main_army->accept($textdump);
        print $textdump->getText();
/* /listing 11.45 */
    }

    public static function run2()
    {
/* listing 11.47 */
        $main_army = new Army();
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCanonUnit());
        $main_army->addUnit(new Cavalry());

        $taxcollector = new TaxCollectionVisitor();
        $main_army->accept($taxcollector);
        print $taxcollector->getReport();
        print "TOTAL: ";
        print $taxcollector->getTax() . "\n";
/* /listing 11.47 */
    }
}
