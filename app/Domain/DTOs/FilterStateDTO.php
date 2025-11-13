<?php

declare(strict_types=1);

namespace App\Domain\DTOs;

use App\Domain\ValueObjects\AvailabilityOption;

final class FilterStateDTO
{
    /**
     * @param int[] $technologyTypeIds
     * @param int[] $datasetTypeIds
     * @param int[] $tagIds
     * @param AvailabilityOption[] $availabilityOptions
     * @param string[] $prospectiveModes
     */
    public function __construct(
        public readonly ?int $sectorId = null,
        public readonly array $technologyTypeIds = [],
        public readonly array $datasetTypeIds = [],
        public readonly array $tagIds = [],
        public readonly array $availabilityOptions = [],
        public readonly array $prospectiveModes = [],
        public readonly ?int $trlMin = null,
        public readonly ?int $trlMax = null,
        public readonly ?string $search = null,
        public readonly bool $onlyHighlighted = false,
        public readonly int $page = 1,
        public readonly int $perPage = 12,
        public readonly ?string $sortField = null,
        public readonly ?string $sortDirection = null,
    ) {}
}
