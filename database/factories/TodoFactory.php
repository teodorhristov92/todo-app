<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = \App\Models\Todo::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'completed' => $this->faker->boolean(30),
            'user_id' => null,
            'category_id' => null,
            'priority_id' => null,
        ];
    }
} 