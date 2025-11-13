<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class SectorFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return $state->sectorId !== null;
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if ($state->sectorId === null) {
            return $query;
        }

        return $this->builder($query)->where('sector_id', $state->sectorId);
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('SectorFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
