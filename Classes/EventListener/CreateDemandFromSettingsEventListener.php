<?php
declare(strict_types=1);

namespace Daoued\NewsExtended\EventListener;

use Daoued\NewsExtended\Event\CreateConstraintsFromDemandEvent;
use Daoued\NewsExtended\Event\CreateDemandFromSettingsEvent;

/**
 * Class CreateConstraintsFromDemandEventListener
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
class CreateDemandFromSettingsEventListener
{
    /**
     * @param CreateDemandFromSettingsEvent $event
     */
    public function __invoke(CreateDemandFromSettingsEvent $event): void
    {
        $settings = $event->getSettings();
        $demand = $event->getDemand();

        // Include your custom settings to demand

        $event->setDemand($demand);
    }
}