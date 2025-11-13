<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\ModelSearchRepositoryInterface;
use App\Domain\ValueObjects\AvailabilityOption;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ModelSearchService
{
    private const SORTABLE_FIELDS = [
        'published_at',
        'title',
        'trl_level',
    ];

    public function __construct(
        private readonly ModelSearchRepositoryInterface $repository,
        private readonly FilterOrchestrator $filterOrchestrator,
    ) {}

    public function buildFilterState(array $payload): FilterStateDTO
    {
        return new FilterStateDTO(
            sectorId: $this->toNullableInt($payload['sector'] ?? null),
            technologyTypeIds: $this->toIntArray(Arr::wrap($payload['technology_types'] ?? [])),
            datasetTypeIds: $this->toIntArray(Arr::wrap($payload['dataset_types'] ?? [])),
            tagIds: $this->toIntArray(Arr::wrap($payload['tags'] ?? [])),
            availabilityOptions: $this->mapAvailability(Arr::wrap($payload['availability'] ?? [])),
            trlMin: $this->toNullableInt($payload['trl_min'] ?? null),
            trlMax: $this->toNullableInt($payload['trl_max'] ?? null),
            search: $payload['search'] ?? null,
            onlyHighlighted: filter_var($payload['highlighted'] ?? false, FILTER_VALIDATE_BOOLEAN),
            page: max(1, (int) ($payload['page'] ?? 1)),
            perPage: max(1, (int) ($payload['per_page'] ?? 12)),
            sortField: $payload['sort_field'] ?? null,
            sortDirection: $payload['sort_direction'] ?? null,
        );
    }

    public function search(FilterStateDTO $state): LengthAwarePaginator
    {
        $query = $this->repository->baseQuery();
        $query = $this->filterOrchestrator->apply($query, $state);

        if ($state->onlyHighlighted) {
            $query->where('is_highlighted', true);
        }

        $sortField = $this->resolveSortField($state->sortField);
        $direction = $this->resolveSortDirection($state->sortDirection);
        $query->orderBy($sortField, $direction);

        return $this->repository->paginate($query, $state->perPage, $state->page);
    }

    /**
     * @return array<int, \App\Domain\DTOs\ModelCardDTO>
     */
    public function cardsFromResult(LengthAwarePaginator $paginator): array
    {
        return $this->repository->toModelCardDTOs($paginator);
    }

    /**
     * @param array<int|string|null> $values
     * @return int[]
     */
    private function toIntArray(array $values): array
    {
        return collect($values)
            ->filter(fn ($value) => $value !== null)
            ->map(fn ($value) => (int) $value)
            ->filter(fn (int $value) => $value > 0)
            ->unique()
            ->values()
            ->all();
    }

    private function toNullableInt(mixed $value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (int) $value;
    }

    /**
     * @param array<int, string> $options
     * @return AvailabilityOption[]
     */
    private function mapAvailability(array $options): array
    {
        return collect($options)
            ->map(function (string $value) {
                try {
                    return AvailabilityOption::fromString($value);
                } catch (\InvalidArgumentException) {
                    return null;
                }
            })
            ->filter()
            ->values()
            ->all();
    }

    private function resolveSortField(?string $field): string
    {
        if ($field !== null && in_array($field, self::SORTABLE_FIELDS, true)) {
            return $field;
        }

        return 'published_at';
    }

    private function resolveSortDirection(?string $direction): string
    {
        if ($direction !== null && in_array(strtolower($direction), ['asc', 'desc'], true)) {
            return strtolower($direction);
        }

        return 'desc';
    }
}
