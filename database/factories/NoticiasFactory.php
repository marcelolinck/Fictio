<?php

namespace Database\Factories;

use App\Models\Noticias\NoticiasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoticiasNoticiasModel>
 */
class NoticiasFactory extends Factory
{
    protected $model = NoticiasModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            
        ];
    }
}
