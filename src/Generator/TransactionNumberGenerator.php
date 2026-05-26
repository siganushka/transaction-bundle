<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Generator;

use Godruoyi\Snowflake\Snowflake;
use Siganushka\TransactionBundle\Entity\Transaction;

class TransactionNumberGenerator implements TransactionNumberGeneratorInterface
{
    public function __construct(private readonly Snowflake $snowflake = new Snowflake())
    {
    }

    public function generate(Transaction $entity): string
    {
        return $this->snowflake->id();
    }
}
