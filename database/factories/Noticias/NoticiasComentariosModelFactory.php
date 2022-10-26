<?php

namespace Database\Factories\Noticias;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Noticias\NoticiasComentariosModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoticiasComentariosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'descricao' => $this->faker->text(255),
            'noticia_comentario_status_id' => $this->faker->numberBetween(1, 3),
            'noticia_id' => $this->faker->numberBetween(1, 50),
            'user_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
