<?php

namespace Database\Seeders;

use App\Services\AuthorizationService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            AuthorizationService::PERMISSION_VIEW_RESTRICTED,
            AuthorizationService::PERMISSION_MANAGE_CATALOG,
        ] as $permission) {
            Permission::findOrCreate($permission, 'web');
        }
    }
}
