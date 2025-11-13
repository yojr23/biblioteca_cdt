<?php

namespace Database\Factories;

use App\Infrastructure\Eloquent\Models\EloquentDatasetType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<EloquentDatasetType>
 */
class EloquentDatasetTypeFactory extends Factory
{
    protected $model = EloquentDatasetType::class;

    public function definition(): array
    {
        $name = Str::title($this->faker->unique()->word);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(6),
        ];
    }
}
