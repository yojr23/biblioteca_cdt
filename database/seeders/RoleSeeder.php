<?php

namespace Database\Seeders;

use App\Services\AuthorizationService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $viewRestricted = Permission::where('name', AuthorizationService::PERMISSION_VIEW_RESTRICTED)->firstOrFail();
        $manageCatalog = Permission::where('name', AuthorizationService::PERMISSION_MANAGE_CATALOG)->firstOrFail();

        $visitor = Role::findOrCreate(AuthorizationService::ROLE_VISITOR, 'web');
        $admin = Role::findOrCreate(AuthorizationService::ROLE_ADMIN, 'web');

        $visitor->givePermissionTo($viewRestricted);
        $admin->syncPermissions([$viewRestricted, $manageCatalog]);
    }
}
