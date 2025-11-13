<?php

namespace Database\Seeders;

use App\Infrastructure\Eloquent\Models\EloquentTechnologyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologyTypeSeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            'Visión Computacional',
            'Deep Learning',
            'Asistentes Conversacionales',
            'Reconocimiento de Voz',
            'NLP',
            'Blockchain',
        ];

        foreach ($technologies as $tech) {
            EloquentTechnologyType::query()->updateOrCreate(
                ['slug' => Str::slug($tech)],
                ['name' => $tech]
            );
        }
    }
}
