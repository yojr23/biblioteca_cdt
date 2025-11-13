<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\ValueObjects\Slug;

final class TechnologyType
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly Slug $slug,
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
}
