<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\DTOs\ResourceEmbedDTO;
use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Models\User;
use App\Services\Decorators\RestrictedResourceDecorator;
use App\Services\EmbedStrategies\ResourceEmbedStrategyInterface;

class ResourceEmbedService
{
    /** @var ResourceEmbedStrategyInterface[] */
    private array $strategies;

    public function __construct(
        private readonly AuthorizationService $authorizationService,
        private readonly RestrictedResourceDecorator $decorator,
        iterable $strategies,
    ) {
        $this->strategies = [];
        foreach ($strategies as $strategy) {
            $this->strategies[] = $strategy;
        }
    }

    public function build(EloquentResource $resource, ?User $user = null): ResourceEmbedDTO
    {
        $strategy = $this->resolveStrategy($resource);
        $dto = $strategy->build($resource);

        if ($resource->requires_auth && ! $this->authorizationService->canViewRestrictedResources($user)) {
            return $this->decorator->blur($dto);
        }

        return $dto;
    }

    private function resolveStrategy(EloquentResource $resource): ResourceEmbedStrategyInterface
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($resource)) {
                return $strategy;
            }
        }

        throw new \RuntimeException('No embed strategy available for provider: '.$resource->provider);
    }
}
