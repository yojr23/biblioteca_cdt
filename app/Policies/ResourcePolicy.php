<?php

declare(strict_types=1);

namespace App\Policies;

use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Models\User;
use App\Services\AuthorizationService;

class ResourcePolicy
{
    public function __construct(private readonly AuthorizationService $authorizationService)
    {
    }

    public function view(?User $user, EloquentResource $resource): bool
    {
        if (! $resource->requires_auth) {
            return true;
        }

        return $this->authorizationService->canViewRestrictedResources($user);
    }

    public function manage(?User $user): bool
    {
        return $this->authorizationService->canManageCatalog($user);
    }
}
