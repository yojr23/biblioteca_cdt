<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Models\Model as DomainModel;
use App\Infrastructure\Eloquent\Models\EloquentModel as PersistenceModel;
use App\Models\User;

final class AuthorizationService
{
    public const ROLE_VISITOR = 'visitor';
    public const ROLE_ADMIN = 'cdt-admin';

    public const PERMISSION_VIEW_RESTRICTED = 'catalog.view_restricted';
    public const PERMISSION_MANAGE_CATALOG = 'catalog.manage';

    public function canViewRestrictedResources(?User $user): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->hasRole(self::ROLE_ADMIN)
            || $user->hasRole(self::ROLE_VISITOR)
            || $user->can(self::PERMISSION_VIEW_RESTRICTED);
    }

    public function canManageCatalog(?User $user): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->hasRole(self::ROLE_ADMIN)
            || $user->can(self::PERMISSION_MANAGE_CATALOG);
    }

    public function canViewModel(?User $user, DomainModel|PersistenceModel $model): bool
    {
        $status = $model instanceof DomainModel ? $model->status() : (string) $model->status;

        if ($status === 'published') {
            return true;
        }

        return $this->canManageCatalog($user);
    }
}
