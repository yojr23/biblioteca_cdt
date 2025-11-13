<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Domain\ValueObjects\AvailabilityOption;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;

final class Model
{
    /**
     * @param AvailabilityOption[] $availabilityOptions
     * @param Tag[] $tags
     * @param TechnologyType[] $technologyTypes
     * @param DatasetType[] $datasetTypes
     * @param Resource[] $resources
     */
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly Slug $slug,
        private readonly string $shortDescription,
        private readonly ?string $longDescriptionPublic,
        private readonly ?string $longDescriptionPrivate,
        private readonly Sector $sector,
        private readonly TRLLevel $trlLevel,
        private readonly array $availabilityOptions,
        private readonly string $status,
        private readonly bool $isKit,
        private readonly array $tags = [],
        private readonly array $technologyTypes = [],
        private readonly array $datasetTypes = [],
        private readonly array $resources = [],
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function slug(): Slug
    {
        return $this->slug;
    }

    public function shortDescription(): string
    {
        return $this->shortDescription;
    }

    public function longDescriptionPublic(): ?string
    {
        return $this->longDescriptionPublic;
    }

    public function longDescriptionPrivate(): ?string
    {
        return $this->longDescriptionPrivate;
    }

    public function sector(): Sector
    {
        return $this->sector;
    }

    public function trlLevel(): TRLLevel
    {
        return $this->trlLevel;
    }

    /**
     * @return AvailabilityOption[]
     */
    public function availabilityOptions(): array
    {
        return $this->availabilityOptions;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function isKit(): bool
    {
        return $this->isKit;
    }

    /**
     * @return Tag[]
     */
    public function tags(): array
    {
        return $this->tags;
    }

    /**
     * @return TechnologyType[]
     */
    public function technologyTypes(): array
    {
        return $this->technologyTypes;
    }

    /**
     * @return DatasetType[]
     */
    public function datasetTypes(): array
    {
        return $this->datasetTypes;
    }

    /**
     * @return Resource[]
     */
    public function resources(): array
    {
        return $this->resources;
    }
}
