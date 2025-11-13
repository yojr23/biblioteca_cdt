<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\FilterStrategyInterface;

final class FilterOrchestrator
{
    /** @var FilterStrategyInterface[] */
    private array $strategies;

    /**
     * @param iterable<FilterStrategyInterface> $strategies
     */
    public function __construct(iterable $strategies)
    {
        $this->strategies = [];
        foreach ($strategies as $strategy) {
            $this->strategies[] = $strategy;
        }
    }

    public function apply(mixed $query, FilterStateDTO $state): mixed
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->shouldApply($state)) {
                $query = $strategy->apply($query, $state);
            }
        }

        return $query;
    }
}
