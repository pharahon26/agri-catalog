<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'user_id' => 1,
        ];
    }
}
