<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class TechnologyTypeFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return ! empty($state->technologyTypeIds);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (empty($state->technologyTypeIds)) {
            return $query;
        }

        return $this->builder($query)->whereHas('technologyTypes', function (Builder $builder) use ($state): void {
            $builder->whereIn('technology_types.id', $state->technologyTypeIds);
        });
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('TechnologyTypeFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
