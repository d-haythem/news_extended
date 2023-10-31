<?php
declare(strict_types=1);

namespace Daoued\NewsExtended\Domain\Repository;

use Daoued\NewsExtended\Event\CreateConstraintsFromDemandEvent;
use GeorgRinger\News\Domain\Model\DemandInterface;
use GeorgRinger\News\Domain\Repository\NewsRepository as BaseNewsRepository;
use Psr\EventDispatcher\EventDispatcherInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Class NewsRepository
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
class NewsRepository extends BaseNewsRepository
{
    protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand): array
    {
        $constraints = parent::createConstraintsFromDemand($query, $demand);

        $event = new CreateConstraintsFromDemandEvent($query, $demand, $constraints);
        $eventDispatcher = GeneralUtility::makeInstance(EventDispatcherInterface::class);
        return $eventDispatcher->dispatch($event)->getConstraints();
    }
}