<?php

declare(strict_types=1);

namespace App\Services\Decorators;

use App\Domain\DTOs\ResourceEmbedDTO;

class RestrictedResourceDecorator
{
    public function blur(ResourceEmbedDTO $dto, string $ctaLabel = 'Inicia sesión para acceder'): ResourceEmbedDTO
    {
        return new ResourceEmbedDTO(
            resourceId: $dto->resourceId,
            type: $dto->type,
            provider: $dto->provider,
            url: $dto->url,
            requiresAuth: true,
            isBlurred: true,
            ctaLabel: $ctaLabel,
            meta: $dto->meta,
        );
    }
}
