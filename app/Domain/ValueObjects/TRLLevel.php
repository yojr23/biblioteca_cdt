<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class TRLLevel
{
    private const MIN = 1;
    private const MAX = 9;

    public function __construct(private readonly int $value)
    {
        if ($value < self::MIN || $value > self::MAX) {
            throw new \InvalidArgumentException('TRL level must be between '.self::MIN.' and '.self::MAX.'.');
        }
    }

    public static function fromInt(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
