<?php

declare(strict_types=1);

namespace App\Services\EmbedStrategies;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Infrastructure\Eloquent\Models\EloquentResource;

class InternalDemoEmbedStrategy implements ResourceEmbedStrategyInterface
{
    public function supports(EloquentResource $resource): bool
    {
        return true;
    }

    public function build(EloquentResource $resource): ResourceEmbedDTO
    {
        return new ResourceEmbedDTO(
            resourceId: $resource->id,
            type: $resource->type,
            provider: $resource->provider ?? 'internal',
            url: $resource->url ?? $resource->storage_path ?? '#',
            requiresAuth: (bool) $resource->requires_auth,
            meta: $resource->meta ?? [],
        );
    }
}
