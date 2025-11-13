<?php

declare(strict_types=1);

namespace App\Policies;

use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Models\User;
use App\Services\AuthorizationService;

class ModelPolicy
{
    public function __construct(private readonly AuthorizationService $authorizationService)
    {
    }

    public function viewRestricted(?User $user): bool
    {
        return $this->authorizationService->canViewRestrictedResources($user);
    }

    public function update(?User $user, EloquentModel $model): bool
    {
        return $this->authorizationService->canManageCatalog($user);
    }

    public function delete(?User $user, EloquentModel $model): bool
    {
        return $this->authorizationService->canManageCatalog($user);
    }
}
