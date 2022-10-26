<?php

namespace Database\Factories\Noticias;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoticiasTagsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'noticia_id' => $this->faker->numberBetween(1, 50),
            'tag_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
