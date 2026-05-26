<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Siganushka\TransactionBundle\Tests\Fixtures\Bar;
use Siganushka\TransactionBundle\Tests\Fixtures\BarTransaction;
use Siganushka\TransactionBundle\Tests\Fixtures\FooTransaction;

class TransactionTest extends TestCase
{
    public function testAll(): void
    {
        $transaction1 = new FooTransaction(1024);
        static::assertSame(1024, $transaction1->getAmount());
        static::assertNull($transaction1->getNumber());
        static::assertNull($transaction1->getPayMethod());
        static::assertNull($transaction1->getPayRequest());
        static::assertNull($transaction1->getPayResponse());
        static::assertFalse($transaction1->isSuccessful());

        $transaction2 = new BarTransaction();
        $transaction2->addBar(new Bar(1));
        $transaction2->addBar(new Bar(2));
        $transaction2->addBar(new Bar(3));

        static::assertSame(6, $transaction2->getAmount());
        static::assertNull($transaction2->getNumber());
        static::assertNull($transaction2->getPayMethod());
        static::assertNull($transaction2->getPayRequest());
        static::assertNull($transaction2->getPayResponse());
        static::assertFalse($transaction2->isSuccessful());
    }
}
