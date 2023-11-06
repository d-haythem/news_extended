<?php

namespace Daoued\NewsExtended\Controller;

use Daoued\NewsExtended\Event\CreateDemandFromSettingsEvent;
use GeorgRinger\News\Controller\NewsController as NewsBaseController;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;
use Psr\Http\Message\ResponseInterface;

/**
 * Class NewsController
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
class NewsController extends NewsBaseController
{
    protected function createDemandObjectFromSettings(
        array $settings,
              $class = NewsDemand::class
    ): \GeorgRinger\News\Domain\Model\Dto\NewsDemand {
        $demand = parent::createDemandObjectFromSettings($settings, $class);

        $event = new CreateDemandFromSettingsEvent($settings, $demand);

        return $this->eventDispatcher->dispatch($event)->getDemand();
    }

    public function listAndFilterAction(): ResponseInterface
    {
        // Implement Filter LOGIC


        // Implement NEWS LIST LOGIC
        parent::listAction();

        return $this->htmlResponse();
    }
}