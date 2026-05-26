<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Dto;

use Siganushka\GenericBundle\Dto\DateRangeDto;

class TransactionQueryDto
{
    public function __construct(
        public readonly ?string $number = null,
        public readonly ?DateRangeDto $created = null,
    ) {
    }
}
