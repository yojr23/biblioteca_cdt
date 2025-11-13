<?php

declare(strict_types=1);

namespace App\Domain\DTOs;

use App\Domain\ValueObjects\AvailabilityOption;
use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;

final class ModelCardDTO
{
    /**
     * @param AvailabilityOption[] $availabilityOptions
     * @param string[] $technologyTypes
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly Slug $slug,
        public readonly string $shortDescription,
        public readonly string $sectorName,
        public readonly ColorCode $sectorColor,
        public readonly TRLLevel $trlLevel,
        public readonly array $availabilityOptions = [],
        public readonly array $technologyTypes = [],
        public readonly bool $hasRestrictedResources = false,
        public readonly bool $highlighted = false,
    ) {}
}
