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
    private function gerarArray(){
        for($i=0; $i<=rand(1,19);$i++){
            $arr[] = ucwords($this->faker->word(10));
        }
        return $arr;
    }
    public function definition()
    {
        return [
            'titulo' => $this->faker->unique()->sentence(),
            'corpo' => $this->faker->paragraph(50),
            'noticia_status_id' => $this->faker->numberBetween(1, 2),
            'user_id' => $this->faker->numberBetween(1, 10),
            'tags' => $this->gerarArray(),
            //'user_id' => $this->faker->randomElement(rand(1,10)),
            //'criador' => $this->faker->randomElement(['Fulano', 'Tiririca', 'Pelé']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
