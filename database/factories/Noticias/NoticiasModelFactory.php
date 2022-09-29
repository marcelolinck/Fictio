<?php

namespace Database\Factories\Noticias;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoticiasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->unique()->sentence(),
            'corpo' => $this->faker->paragraph(50),
           // 'noticia_status_id' => $this->faker->numberBetween(1, 2),
            //'user_id' => $this->faker->numberBetween(1, 10),
            'tags' => [
                'nome'=>['Abra', 'Cadabra', 'Funciona', 'Futebol'] [rand(0,3)],
            ],
            'status' => [
                'descricao'=>['Publicado', 'Não Publicado'] [rand(0,1)],
            ],
            'criador' => [
                'nome'=>['Fulano', 'Tiririca', 'Pelé'] [rand(0,2)],
            ],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
