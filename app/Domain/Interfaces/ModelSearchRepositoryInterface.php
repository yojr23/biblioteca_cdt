<?php

declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\DTOs\ModelCardDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ModelSearchRepositoryInterface
{
    /**
     * Return the base query object used for catalog searches.
     *
     * @return mixed
     */
    public function baseQuery(): mixed;

    /**
     * Apply pagination on top of the given query instance.
     */
    public function paginate(mixed $query, int $perPage = 12, int $page = 1): LengthAwarePaginator;

    /**
     * Hydrate ModelCardDTOs from the evaluated query.
     *
     * @return ModelCardDTO[]
     */
    public function toModelCardDTOs(mixed $query): array;
}
