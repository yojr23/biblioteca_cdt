<?php

declare(strict_types=1);

namespace App\Domain\DTOs;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Domain\ValueObjects\AvailabilityOption;
use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;

final class ModelDetailDTO
{
    /**
     * @param string[] $tags
     * @param string[] $technologyTypes
     * @param string[] $datasetTypes
     * @param AvailabilityOption[] $availabilityOptions
     * @param ResourceEmbedDTO[] $resources
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly Slug $slug,
        public readonly string $sectorName,
        public readonly ColorCode $sectorColor,
        public readonly string $sectorSlug,
        public readonly string $shortDescription,
        public readonly ?string $longDescriptionPublic,
        public readonly ?string $longDescriptionPrivate,
        public readonly TRLLevel $trlLevel,
        public readonly array $availabilityOptions = [],
        public readonly array $tags = [],
        public readonly array $technologyTypes = [],
        public readonly array $datasetTypes = [],
        public readonly array $resources = [],
        public readonly bool $isKit = false,
        public readonly bool $restricted = false,
    ) {}
}
