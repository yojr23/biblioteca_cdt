<?php

declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\DTOs\FilterStateDTO;

interface FilterStrategyInterface
{
    public function shouldApply(FilterStateDTO $state): bool;

    /**
     * @param mixed $query
     * @return mixed
     */
    public function apply(mixed $query, FilterStateDTO $state): mixed;
}
