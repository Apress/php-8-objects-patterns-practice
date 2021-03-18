<?php

declare(strict_types=1);

namespace popp\ch04\batch06_3;

class Runner
{
    public static function run()
    {
/* suspended_listing 04.24 */
        $p = new ShopProduct();
        $ret = self::storeIdentityObject($p);
        print $ret->calculateTax(100) . "\n";
        print $ret->generateId() . "\n";
/* /suspended_listing 04.24 */
    }

    public static function run2()
    {
/* suspended_listing 04.28 */
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
/* /suspended_listing 04.28 */
    }


/* listing 04.34 */
    public static function storeIdentityObject(IdentityObject $idobj)
    {
        // do something with the IdentityObject
/* /listing 04.34 */
        return $idobj;
/* listing 04.34 */
    }
/* /listing 04.34 */
}
