<?php

declare(strict_types=1);

namespace App\Services\Strategies;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;
use App\Domain\ValueObjects\AvailabilityOption;
use Illuminate\Database\Eloquent\Builder;

class AvailabilityFilterStrategy implements FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool
    {
        return ! empty($state->availabilityOptions);
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        if (empty($state->availabilityOptions)) {
            return $query;
        }

        $flags = array_map(static fn (AvailabilityOption $option): string => $option->value, $state->availabilityOptions);

        return $this->builder($query)->where(function (Builder $builder) use ($flags): void {
            foreach ($flags as $flag) {
                $builder->orWhereJsonContains('availability_flags', $flag);
            }
        });
    }

    private function builder(mixed $query): Builder
    {
        if (! $query instanceof Builder) {
            throw new \InvalidArgumentException('AvailabilityFilterStrategy expects an Eloquent Builder instance.');
        }

        return $query;
    }
}
