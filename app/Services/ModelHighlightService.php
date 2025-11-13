<?php

declare(strict_types=1);

namespace App\Services;

use App\Infrastructure\Repositories\EloquentModelRepository;

class ModelHighlightService
{
    public function __construct(private readonly EloquentModelRepository $repository)
    {
    }

    /**
     * @return array<int, \App\Domain\DTOs\ModelCardDTO>
     */
    public function highlighted(int $limit = 6): array
    {
        $query = $this->repository->baseQuery()
            ->where('is_highlighted', true)
            ->orderByDesc('published_at')
            ->limit($limit);

        return $this->repository->toModelCardDTOs($query);
    }

    /**
     * @return array<int, \App\Domain\DTOs\ModelCardDTO>
     */
    public function mostViewed(int $limit = 6): array
    {
        $query = $this->repository->baseQuery()
            ->leftJoin('model_metrics', 'model_metrics.model_id', '=', 'models.id')
            ->orderByDesc('model_metrics.views_total')
            ->select('models.*')
            ->limit($limit);

        return $this->repository->toModelCardDTOs($query);
    }
}
