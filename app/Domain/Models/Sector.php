<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;

final class Sector
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly Slug $slug,
        private readonly ColorCode $colorCode,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): Slug
    {
        return $this->slug;
    }

    public function colorCode(): ColorCode
    {
        return $this->colorCode;
    }
}
