<?php

declare(strict_types=1);

namespace App\Domain\DTOs;

final class ResourceEmbedDTO
{
    /**
     * @param array<string, mixed> $meta
     */
    public function __construct(
        public readonly string $type,
        public readonly string $provider,
        public readonly string $url,
        public readonly bool $requiresAuth,
        public readonly bool $isBlurred = false,
        public readonly ?string $ctaLabel = null,
        public readonly array $meta = [],
    ) {}
}
