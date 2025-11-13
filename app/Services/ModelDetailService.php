<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\DTOs\ModelDetailDTO;
use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;
use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Models\User;

class ModelDetailService
{
    public function __construct(private readonly ResourceEmbedService $resourceEmbedService)
    {
    }

    public function toDto(EloquentModel $model, ?User $user = null): ModelDetailDTO
    {
        $sector = $model->sector;
        $availability = collect($model->availability_flags ?? [])
            ->filter(fn ($flag) => is_string($flag))
            ->map(fn ($flag) => \App\Domain\ValueObjects\AvailabilityOption::fromString($flag))
            ->all();

        $resourceEmbeds = $model->resources
            ->map(fn ($resource) => $this->resourceEmbedService->build($resource, $user))
            ->all();

        return new ModelDetailDTO(
            id: $model->id,
            title: $model->title,
            slug: Slug::fromString($model->slug),
            sectorName: $sector?->name ?? 'Sin sector',
            sectorColor: ColorCode::fromString($sector?->color_code ?? '#0EA5E9'),
            sectorSlug: $sector?->slug ?? 'sin-sector',
            shortDescription: $model->short_description,
            longDescriptionPublic: $model->long_description_public,
            longDescriptionPrivate: $model->long_description_private,
            trlLevel: TRLLevel::fromInt((int) $model->trl_level),
            availabilityOptions: $availability,
            tags: $model->tags->pluck('name')->all(),
            technologyTypes: $model->technologyTypes->pluck('name')->all(),
            datasetTypes: $model->datasetTypes->pluck('name')->all(),
            resources: $resourceEmbeds,
            isKit: (bool) $model->is_kit,
            restricted: $resourceEmbeds !== [] && collect($resourceEmbeds)->contains(fn ($dto) => $dto->requiresAuth),
        );
    }
}
