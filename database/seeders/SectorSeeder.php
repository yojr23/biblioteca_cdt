<?php

namespace Database\Seeders;

use App\Infrastructure\Eloquent\Models\EloquentSector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        $sectors = [
            ['name' => 'Agroindustria', 'color' => '#047857'],
            ['name' => 'Salud', 'color' => '#1d4ed8'],
            ['name' => 'Energía', 'color' => '#f97316'],
            ['name' => 'Educación', 'color' => '#9333ea'],
            ['name' => 'Movilidad', 'color' => '#0f172a'],
        ];

        foreach ($sectors as $sector) {
            EloquentSector::query()->updateOrCreate(
                ['slug' => Str::slug($sector['name'])],
                ['name' => $sector['name'], 'color_code' => $sector['color']]
            );
        }
    }
}
