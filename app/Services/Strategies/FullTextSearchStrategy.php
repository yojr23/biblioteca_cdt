<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use Illuminate\Database\Eloquent\Builder;

class FullTextSearchStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return filled($state->search);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (! filled($state->search)) {
            return $query;
        }

        $term = '%'.$state->search.'%';

        return $this->builder($query)->where(function (Builder $builder) use ($term): void {
            $builder
                ->where('title', 'like', $term)
                ->orWhere('short_description', 'like', $term)
                ->orWhere('long_description_public', 'like', $term);
        });
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('FullTextSearchStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
