<?php

declare(strict_types=1);

namespace App\Domain\Models;

final class Resource
{
    /**
     * @param array<string, mixed> $meta
     */
    public function __construct(
        private readonly int $id,
        private readonly string $type,
        private readonly string $provider,
        private readonly string $url,
        private readonly bool $requiresAuth,
        private readonly array $meta = [],
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function provider(): string
    {
        return $this->provider;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function requiresAuth(): bool
    {
        return $this->requiresAuth;
    }

    /**
     * @return array<string, mixed>
     */
    public function meta(): array
    {
        return $this->meta;
    }
}
