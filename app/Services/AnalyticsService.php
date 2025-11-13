<?php

declare(strict_types=1);

namespace App\Services;

use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Infrastructure\Eloquent\Models\EloquentModelMetric;
use App\Infrastructure\Eloquent\Models\EloquentModelView;
use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Infrastructure\Eloquent\Models\EloquentResourceView;
use App\Models\User;
use Carbon\CarbonImmutable;

class AnalyticsService
{
    public function registerModelView(EloquentModel $model, ?User $user = null, array $meta = []): void
    {
        EloquentModelView::query()->create([
            'model_id' => $model->id,
            'user_id' => $user?->id,
            'session_id' => $meta['session_id'] ?? null,
            'source' => $meta['source'] ?? null,
            'ip_address' => $meta['ip_address'] ?? null,
            'meta' => $meta,
        ]);

        $this->incrementModelMetrics($model);
    }

    public function registerResourceView(EloquentResource $resource, ?User $user = null, array $meta = []): void
    {
        EloquentResourceView::query()->create([
            'resource_id' => $resource->id,
            'model_id' => $meta['model_id'] ?? null,
            'user_id' => $user?->id,
            'session_id' => $meta['session_id'] ?? null,
            'source' => $meta['source'] ?? null,
            'ip_address' => $meta['ip_address'] ?? null,
            'meta' => $meta,
        ]);
    }

    private function incrementModelMetrics(EloquentModel $model): void
    {
        $metrics = EloquentModelMetric::query()->firstOrNew(['model_id' => $model->id]);
        $metrics->views_total = ($metrics->views_total ?? 0) + 1;
        $metrics->views_last_30d = $this->countViewsLast30Days($model->id);
        $metrics->save();
    }

    private function countViewsLast30Days(int $modelId): int
    {
        $since = CarbonImmutable::now()->subDays(30);

        return EloquentModelView::query()
            ->where('model_id', $modelId)
            ->where('created_at', '>=', $since)
            ->count();
    }
}
