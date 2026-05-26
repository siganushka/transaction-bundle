<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use Siganushka\GenericBundle\Repository\GenericEntityRepository;
use Siganushka\TransactionBundle\Dto\TransactionQueryDto;
use Siganushka\TransactionBundle\Entity\Transaction;

/**
 * @template T of Transaction = Transaction
 *
 * @extends GenericEntityRepository<T>
 */
class TransactionRepository extends GenericEntityRepository
{
    /**
     * @return T|null
     */
    public function findOneByNumber(string $number): ?Transaction
    {
        return $this->findOneBy(compact('number'));
    }

    public function createQueryBuilderByDto(string $alias, TransactionQueryDto $dto): QueryBuilder
    {
        $criteria = Criteria::create(true);

        if ($dto->number) {
            $criteria->andWhere(Criteria::expr()->contains('number', $dto->number));
        }

        if ($dto->created?->startAt) {
            $criteria->andWhere(Criteria::expr()->gte('createdAt', $dto->created->startAt));
        }

        if ($dto->created?->endAt) {
            $criteria->andWhere(Criteria::expr()->lte('createdAt', $dto->created->endAt));
        }

        $queryBuilder = $this->createQueryBuilderWithOrderBy($alias);
        $queryBuilder->addCriteria($criteria);

        return $queryBuilder;
    }
}
