<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class DatasetTypeFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return ! empty($state->datasetTypeIds);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (empty($state->datasetTypeIds)) {
            return $query;
        }

        return $this->builder($query)->whereHas('datasetTypes', function (Builder $builder) use ($state): void {
            $builder->whereIn('dataset_types.id', $state->datasetTypeIds);
        });
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('DatasetTypeFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
