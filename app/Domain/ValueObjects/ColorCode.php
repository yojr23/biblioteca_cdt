<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class ColorCode
{
    private const PATTERN = '/^#?[0-9a-fA-F]{6}$/';

    public function __construct(private readonly string $hex)
    {
        if (!preg_match(self::PATTERN, $hex)) {
            throw new \InvalidArgumentException('Invalid HEX color code.');
        }
    }

    public static function fromString(string $hex): self
    {
        return new self($hex);
    }

    public function value(): string
    {
        return strtoupper(str_starts_with($this->hex, '#') ? $this->hex : '#'.$this->hex);
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
