<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Slug
{
    private const PATTERN = '/^[a-z0-9]+(?:-[a-z0-9]+)*$/';

    public function __construct(private readonly string $value)
    {
        if ($value === '') {
            throw new \InvalidArgumentException('Slug cannot be empty.');
        }

        if (!preg_match(self::PATTERN, $value)) {
            throw new \InvalidArgumentException('Slug must be lowercase and kebab-case.');
        }
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
