<?php

declare(strict_types=1);

namespace App\Services;

use App\Infrastructure\Repositories\EloquentModelRepository;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class ModelHighlightService
{
    public function __construct(
        private readonly EloquentModelRepository $repository,
        private readonly CacheRepository $cache,
    ) {}

    /**
     * @return array<int, \App\Domain\DTOs\ModelCardDTO>
     */
    public function highlighted(int $limit = 6): array
    {
        $cacheKey = sprintf('model_highlights_%d', $limit);

        return $this->cache->remember($cacheKey, now()->addMinutes(30), function () use ($limit) {
            $query = $this->repository->baseQuery()
                ->where('is_highlighted', true)
                ->orderByDesc('published_at')
                ->limit($limit);

            return $this->repository->toModelCardDTOs($query);
        });
    }

    /**
     * @return array<int, \App\Domain\DTOs\ModelCardDTO>
     */
    public function mostViewed(int $limit = 6): array
    {
        $cacheKey = sprintf('model_most_viewed_%d', $limit);

        return $this->cache->remember($cacheKey, now()->addMinutes(30), function () use ($limit) {
            $query = $this->repository->baseQuery()
                ->leftJoin('model_metrics', 'model_metrics.model_id', '=', 'models.id')
                ->orderByDesc('model_metrics.views_total')
                ->select('models.*')
                ->limit($limit);

            return $this->repository->toModelCardDTOs($query);
        });
    }
}
