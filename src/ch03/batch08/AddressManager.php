<?php

namespace popp\ch03\batch08;

class AddressManager
{
    private $addresses = array( "209.131.36.159", "216.58.213.174" );

/* listing 03.27 */
    public function outputAddresses($resolve)
    {
        if (! is_bool($resolve)) {
            // do something drastic
/* /listing 03.27 */
            return false;
/* listing 03.27 */
        }
/* /listing 03.27 */
        return true;
/* listing 03.27 */
    }
/* /listing 03.27 */
}
