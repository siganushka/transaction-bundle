<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Tests\Fixtures;

use Siganushka\TransactionBundle\Entity\Transaction;

class FooTransaction extends Transaction
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
}
