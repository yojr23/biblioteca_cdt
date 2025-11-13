<?php

declare(strict_types=1);

namespace App\Services\EmbedStrategies;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Infrastructure\Eloquent\Models\EloquentResource;

class YouTubeEmbedStrategy implements ResourceEmbedStrategyInterface
{
    public function supports(EloquentResource $resource): bool
    {
        return $resource->provider === 'youtube';
    }

    public function build(EloquentResource $resource): ResourceEmbedDTO
    {
        $videoId = $this->extractVideoId($resource->meta['video_id'] ?? $resource->url ?? '');
        $embedUrl = $videoId ? sprintf('https://www.youtube.com/embed/%s', $videoId) : ($resource->url ?? '');

        return new ResourceEmbedDTO(
            resourceId: $resource->id,
            type: 'video',
            provider: 'youtube',
            url: $embedUrl,
            requiresAuth: (bool) $resource->requires_auth,
            meta: $resource->meta ?? [],
        );
    }

    private function extractVideoId(string $value): string
    {
        if ($value === '') {
            return '';
        }

        if (preg_match('/v=([\w-]+)/', $value, $matches)) {
            return $matches[1];
        }

        if (preg_match('/youtu\.be\/([\w-]+)/', $value, $matches)) {
            return $matches[1];
        }

        return $value;
    }
}
