<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SiganushkaTransactionBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
