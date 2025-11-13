<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Domain\DTOs\ModelCardDTO;
use App\Domain\Interfaces\ModelSearchRepositoryInterface;
use App\Domain\ValueObjects\AvailabilityOption;
use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;
use App\Infrastructure\Eloquent\Models\EloquentModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

final class EloquentModelRepository implements ModelSearchRepositoryInterface
{
    public function baseQuery(): Builder
    {
        return EloquentModel::query()
            ->with([
                'sector:id,name,slug,color_code',
                'technologyTypes:id,name',
                'resources:id,title,requires_auth',
            ]);
    }

    public function paginate(mixed $query, int $perPage = 12, int $page = 1): LengthAwarePaginator
    {
        if ($query instanceof Builder) {
            return $query->paginate($perPage, ['*'], 'page', $page);
        }

        if ($query instanceof LengthAwarePaginator) {
            return $query;
        }

        throw new \InvalidArgumentException('Unsupported query type for pagination.');
    }

    public function toModelCardDTOs(mixed $query): array
    {
        return $this->resolveCollection($query)
            ->map(fn (EloquentModel $model) => $this->mapToCardDTO($model))
            ->all();
    }

    private function resolveCollection(mixed $query): Collection
    {
        if ($query instanceof LengthAwarePaginator) {
            return $query->getCollection();
        }

        if ($query instanceof EloquentCollection) {
            return $query;
        }

        if ($query instanceof Builder) {
            return $query->get();
        }

        if ($query instanceof Collection) {
            return $query;
        }

        throw new \InvalidArgumentException('Unsupported query type.');
    }

    private function mapToCardDTO(EloquentModel $model): ModelCardDTO
    {
        $sectorColor = $model->sector?->color_code ?? '#000000';

        return new ModelCardDTO(
            id: $model->id,
            title: $model->title,
            slug: Slug::fromString($model->slug),
            shortDescription: $model->short_description,
            sectorName: $model->sector?->name ?? 'Sin sector',
            sectorColor: ColorCode::fromString($sectorColor),
            trlLevel: TRLLevel::fromInt((int) $model->trl_level),
            availabilityOptions: $this->mapAvailabilityOptions($model->availability_flags ?? []),
            technologyTypes: $model->technologyTypes->pluck('name')->all(),
            hasRestrictedResources: $model->resources->contains(fn ($resource) => (bool) $resource->requires_auth || ($resource->pivot?->visibility === 'restricted')),
            highlighted: (bool) $model->is_highlighted,
        );
    }

    /**
     * @param array<int, string>|null $flags
     * @return AvailabilityOption[]
     */
    private function mapAvailabilityOptions(?array $flags): array
    {
        if ($flags === null) {
            return [];
        }

        return collect($flags)
            ->filter(fn ($flag) => is_string($flag))
            ->map(function (string $flag) {
                try {
                    return AvailabilityOption::fromString($flag);
                } catch (\InvalidArgumentException) {
                    return null;
                }
            })
            ->filter()
            ->values()
            ->all();
    }
}
