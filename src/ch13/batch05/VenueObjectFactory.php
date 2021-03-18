<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\Venue;
use popp\ch13\batch04\DomainObject;

/* listing 13.34 */
class VenueObjectFactory extends DomainObjectFactory
{
    public function createObject(array $row): Venue
    {
/* /listing 13.34 */
        $old = $this->getFromMap(Venue::class, $row['id']);

        if ($old) {
            return $old;
        }
/* listing 13.34 */
        $obj = new Venue((int)$row['id'], $row['name']);
/* /listing 13.34 */
        $this->addToMap($obj);
        //$space_mapper = new SpaceMapper();
        //$space_collection = $space_mapper->findByVenue( $row['id'] );
        //$obj->setSpaces( $space_collection );
/* listing 13.34 */

        return $obj;
    }
}
