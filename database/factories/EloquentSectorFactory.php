<?php

namespace Database\Factories;

use App\Infrastructure\Eloquent\Models\EloquentSector;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<EloquentSector>
 */
class EloquentSectorFactory extends Factory
{
    protected $model = EloquentSector::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->company;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'color_code' => '#'.strtoupper($this->faker->hexColor),
        ];
    }
}
