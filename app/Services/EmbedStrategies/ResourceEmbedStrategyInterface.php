<?php

declare(strict_types=1);

namespace App\Services\EmbedStrategies;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Infrastructure\Eloquent\Models\EloquentResource;

interface ResourceEmbedStrategyInterface
{
    public function supports(EloquentResource $resource): bool;

    public function build(EloquentResource $resource): ResourceEmbedDTO;
}
