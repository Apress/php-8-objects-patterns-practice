<?php

namespace popp\ch03\batch07;

class AddressManager
{
    private $addresses = array( "209.131.36.159", "216.58.213.174" );

/* listing 03.26 */

    /**
     * Outputs the list of addresses.
     * If $resolve is true then each address will be resolved
     * @param    $resolve    boolean    Resolve the address?
     */
    public function outputAddresses($resolve)
    {

        // ...
/* /listing 03.26 */
        if (is_string($resolve)) {
            $resolve = (preg_match("/^(false|no|off)$/i", $resolve) ) ? false : true;
        }

        foreach ($this->addresses as $address) {
            print $address;
            if ($resolve) {
                print " (" . gethostbyaddr($address) . ")";
            }
            print "\n";
        }
/* listing 03.26 */
    }
/* /listing 03.26 */
}
