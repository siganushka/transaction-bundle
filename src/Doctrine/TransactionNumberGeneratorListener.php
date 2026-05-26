<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Doctrine;

use Siganushka\TransactionBundle\Entity\Transaction;
use Siganushka\TransactionBundle\Generator\TransactionNumberGeneratorInterface;

class TransactionNumberGeneratorListener
{
    public function __construct(private readonly TransactionNumberGeneratorInterface $numberGenerator)
    {
    }

    public function __invoke(Transaction $entity): void
    {
        if (!$entity->getNumber()) {
            $entity->setNumber($this->numberGenerator->generate($entity));
        }
    }
}
