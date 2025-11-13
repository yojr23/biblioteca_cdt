<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class TagFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return ! empty($state->tagIds);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (empty($state->tagIds)) {
            return $query;
        }

        return $this->builder($query)->whereHas('tags', function (Builder $builder) use ($state): void {
            $builder->whereIn('tags.id', $state->tagIds);
        });
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('TagFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
