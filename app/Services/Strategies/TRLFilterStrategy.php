<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class TRLFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return $state->trlMin !== null || $state->trlMax !== null;
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        $builder = $this->builder($query);

        if ($state->trlMin !== null) {
            $builder->where('trl_level', '>=', $state->trlMin);
        }

        if ($state->trlMax !== null) {
            $builder->where('trl_level', '<=', $state->trlMax);
        }

        return $builder;
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('TRLFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
