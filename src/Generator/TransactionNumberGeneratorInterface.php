<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Generator;

use Siganushka\TransactionBundle\Entity\Transaction;

interface TransactionNumberGeneratorInterface
{
    public function generate(Transaction $entity): string;
}
