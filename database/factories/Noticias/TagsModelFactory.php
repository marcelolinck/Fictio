<?php

namespace Database\Factories\Noticias;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->word(50),
            'destaque' => rand(true,false),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
