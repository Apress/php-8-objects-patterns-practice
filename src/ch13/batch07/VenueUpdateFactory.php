<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\DomainObject;

/* listing 13.45 */
class VenueUpdateFactory extends UpdateFactory
{
    public function newUpdate(DomainObject $obj): array
    {
        // note type checking removed
        $id = $obj->getId();
        $cond = null;
        $values['name'] = $obj->getName();

        if ($id > 0) {
            $cond['id'] = $id;
        }

        return $this->buildStatement("venue", $values, $cond);
    }
}
/* /listing 13.45 */
