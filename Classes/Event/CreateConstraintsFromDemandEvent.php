<?php
declare(strict_types=1);

namespace Daoued\NewsExtended\Event;

use GeorgRinger\News\Domain\Model\Dto\NewsDemand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Class CreateConstraintsFromDemandEvent
 *
 * @author Haythem Daoud <haythemdaoud.x@gmail.com>
 */
final class CreateConstraintsFromDemandEvent
{
    /**
     * CreateConstraintsFromDemandEvent constructor.
     *
     * @param QueryInterface  $query
     * @param NewsDemand $demand
     * @param array $constraints
     */
    public function __construct(
        protected QueryInterface $query,
        protected NewsDemand $demand,
        protected array $constraints)
    {}

    /**
     * @return QueryInterface
     */
    public function getQuery(): QueryInterface
    {
        return $this->query;
    }

    /**
     * @return NewsDemand
     */
    public function getDemand(): NewsDemand
    {
        return $this->demand;
    }

    /**
     * @return array
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * @param array $constraints
     */
    public function setConstraints(array $constraints)
    {
        $this->constraints = $constraints;
    }
}
