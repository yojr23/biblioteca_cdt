<?php

declare(strict_types=1);

namespace App\Services\EmbedStrategies;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Infrastructure\Eloquent\Models\EloquentResource;
use Illuminate\Support\Facades\URL;

class PDFJSEmbedStrategy implements ResourceEmbedStrategyInterface
{
    public function supports(EloquentResource $resource): bool
    {
        return $resource->provider === 'pdfjs';
    }

    public function build(EloquentResource $resource): ResourceEmbedDTO
    {
        $viewerUrl = URL::to('/pdf-viewer?file='.urlencode((string) $resource->url));

        return new ResourceEmbedDTO(
            resourceId: $resource->id,
            type: 'document',
            provider: 'pdfjs',
            url: $viewerUrl,
            requiresAuth: (bool) $resource->requires_auth,
            meta: $resource->meta ?? [],
        );
    }
}
