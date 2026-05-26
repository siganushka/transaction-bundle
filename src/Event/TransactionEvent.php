<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Entity;

use Symfony\Contracts\EventDispatcher\Event;

class TransactionEvent extends Event
{
    public function __construct(protected readonly Transaction $transaction)
    {
    }

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }
}
