<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\AuthorizationService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SectorSeeder::class,
            TechnologyTypeSeeder::class,
            DatasetTypeSeeder::class,
        ]);

        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@cdt.local'],
            ['name' => 'CDT Admin', 'password' => bcrypt('password')]
        );

        $admin->assignRole(AuthorizationService::ROLE_ADMIN);
    }
}
