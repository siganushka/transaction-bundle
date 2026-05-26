<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Repository;

use Siganushka\GenericBundle\Repository\GenericEntityRepository;
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
}
