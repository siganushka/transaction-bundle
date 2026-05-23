<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Entity;

use Siganushka\Contracts\Doctrine\ResourceInterface;
use Siganushka\Contracts\Doctrine\ResourceTrait;
use Siganushka\Contracts\Doctrine\TimestampableInterface;
use Siganushka\Contracts\Doctrine\TimestampableTrait;
use Siganushka\GenericBundle\Utils\ClassUtils;

abstract class Transaction implements ResourceInterface, TimestampableInterface
{
    use ResourceTrait;
    use TimestampableTrait;

    protected ?string $number = null;
    protected ?int $amount = null;
    protected ?string $payMethod = null;
    protected ?array $payRequest = null;
    protected ?array $payResponse = null;
    protected bool $successful = false;

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getPayMethod(): ?string
    {
        return $this->payMethod;
    }

    public function setPayMethod(string $payMethod): static
    {
        $this->payMethod = $payMethod;

        return $this;
    }

    public function getPayRequest(): ?array
    {
        return $this->payRequest;
    }

    public function setPayRequest(array $payRequest): static
    {
        $this->payRequest = $payRequest;

        return $this;
    }

    public function getPayResponse(): ?array
    {
        return $this->payResponse;
    }

    public function setPayResponse(array $payResponse): static
    {
        $this->payResponse = $payResponse;

        return $this;
    }

    public function isSuccessful(): bool
    {
        return $this->successful;
    }

    public function setSuccessful(bool $successful): static
    {
        $this->successful = $successful;

        return $this;
    }

    public function getType(): string
    {
        return ClassUtils::generateAlias($this);
    }
}
