<?php
declare(strict_types=1);

namespace Daoued\NewsExtended\EventListener;

use Daoued\NewsExtended\Event\CreateConstraintsFromDemandEvent;

/**
 * Class CreateConstraintsFromDemandEventListener
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
class CreateConstraintsFromDemandEventListener
{
    /**
     * @param CreateConstraintsFromDemandEvent $event
     */
    public function __invoke(CreateConstraintsFromDemandEvent $event): void
    {
        $query = $event->getQuery();
        $demand = $event->getDemand();
        $constraints = $event->getConstraints();

        // Apply your custom constraints here

        $event->setConstraints($constraints);
    }
}
