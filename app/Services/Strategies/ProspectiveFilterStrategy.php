<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class ProspectiveFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return ! empty($state->prospectiveModes);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (empty($state->prospectiveModes)) {
            return $query;
        }

        return $this->builder($query)->whereIn('kind', $state->prospectiveModes);
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('ProspectiveFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
