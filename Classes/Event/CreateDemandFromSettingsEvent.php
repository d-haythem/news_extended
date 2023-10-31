<?php
declare(strict_types=1);

namespace Daoued\NewsExtended\Event;

use GeorgRinger\News\Domain\Model\Dto\NewsDemand;

/**
 * Class CreateDemandFromSettingsEvent
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
final class CreateDemandFromSettingsEvent
{
    /**
     * CreateDemandFromSettingsEvent constructor.
     *
     * @param array      $settings
     * @param NewsDemand $demand
     */
    public function __construct(protected array $settings, protected NewsDemand $demand)
    {
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @return NewsDemand
     */
    public function getDemand(): NewsDemand
    {
        return $this->demand;
    }

    /**
     * @param NewsDemand $demand
     */
    public function setDemand(NewsDemand $demand)
    {
        $this->demand = $demand;
    }
}
