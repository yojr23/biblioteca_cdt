<?php

namespace Database\Factories;

use App\Infrastructure\Eloquent\Models\EloquentTechnologyType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<EloquentTechnologyType>
 */
class EloquentTechnologyTypeFactory extends Factory
{
    protected $model = EloquentTechnologyType::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name),
            'icon' => null,
        ];
    }
}
