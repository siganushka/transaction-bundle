<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Tests\Fixtures;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Siganushka\TransactionBundle\Entity\Transaction;

class BarTransaction extends Transaction
{
    /**
     * @var Collection<int, Bar>
     */
    private Collection $bars;

    public function __construct()
    {
        $this->bars = new ArrayCollection();
    }

    public function addBar(Bar $bar): static
    {
        $this->amount += $bar->getPrice();
        $this->bars->add($bar);

        return $this;
    }
}
