<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;

final class Money
{
    public function __construct(private int $amount, private Currency $currency)
    {
        if ($amount < 0) {
            //todo
            throw new \InvalidArgumentException('Amount cannot be negative');
        }

        if (strlen($currency->code()) !== 3) {
            //todo
            throw new \InvalidArgumentException('Invalid currency code');
        }
    }

    public static function zero(Currency $currency): self
    {
        return new self(0, $currency);
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    public function add(self $money): self
    {
        $this->assertSameCurrency($money);

        return new self(
            $this->amount + $money->amount,
            $this->currency
        );
    }

    public function subtract(self $money): self
    {
        $this->assertSameCurrency($money);

        if ($money->amount > $this->amount) {
            throw new \InvalidArgumentException('Resulting amount cannot be negative');
        }

        return new self(
            $this->amount - $money->amount,
            $this->currency
        );
    }

    public function multiply(int $multiplier): self
    {
        if ($multiplier < 0) {
            //todo
            throw new \InvalidArgumentException('Multiplier must be positive');
        }

        return new self(
            $this->amount * $multiplier,
            $this->currency
        );
    }

    public function equals(self $money): bool
    {
        return $this->amount === $money->amount
            && $this->currency === $money->currency;
    }

    private function assertSameCurrency(self $money): void
    {
        if ($this->currency !== $money->currency) {
            //todo
            throw new \InvalidArgumentException('Currencies must be the same');
        }
    }

    public function __toString(): string
    {
        return number_format($this->amount / 100, 2, '.', ' ')
            . ' ' . $this->currency;
    }
}
