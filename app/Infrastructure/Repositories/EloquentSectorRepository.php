<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Eloquent\Models\EloquentSector;
use Illuminate\Support\Collection;

final class EloquentSectorRepository
{
    public function all(): Collection
    {
        return EloquentSector::query()
            ->orderBy('name')
            ->get();
    }

    public function allWithModelCounts(): Collection
    {
        return EloquentSector::query()
            ->withCount('models')
            ->orderBy('name')
            ->get();
    }

    public function findBySlug(string $slug): ?EloquentSector
    {
        return EloquentSector::query()->where('slug', $slug)->first();
    }
}
