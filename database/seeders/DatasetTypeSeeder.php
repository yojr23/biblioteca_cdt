<?php

namespace Database\Seeders;

use App\Infrastructure\Eloquent\Models\EloquentDatasetType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatasetTypeSeeder extends Seeder
{
    public function run(): void
    {
        $datasets = [
            'Imagen',
            'Texto',
            'Audio',
            'Datos Sensor IoT',
            'Datos Estructurados',
        ];

        foreach ($datasets as $dataset) {
            EloquentDatasetType::query()->updateOrCreate(
                ['slug' => Str::slug($dataset)],
                ['name' => $dataset]
            );
        }
    }
}
