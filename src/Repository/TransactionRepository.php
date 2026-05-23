<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Siganushka\GenericBundle\Repository\GenericEntityRepository;
use Siganushka\TransactionBundle\Entity\Transaction;

/**
 * @template T of Transaction = Transaction
 *
 * @extends GenericEntityRepository<T>
 */
class TransactionRepository extends GenericEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        /** @var class-string<T> */
        $entityClass = Transaction::class;
        parent::__construct($registry, $entityClass);
    }

    /**
     * @return T|null
     */
    public function findOneByNumber(string $number): ?Transaction
    {
        return $this->findOneBy(compact('number'));
    }
}
