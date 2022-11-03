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
    private function gerarNum(){
        $arr = [];
        $palavras = ["Lorem","Ipsum","Dolor","Sit","Amet","Ignis"];
        for($i=1; $i<=rand(0,10); $i++){
            $arr[] = $palavras[rand(0,5)];
        }
        return($arr);
    }
    private function gerarArray(){
        for($i=0; $i<=rand(0,19);$i++){
            $arr[] = $this->gerarNum();
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
            /* 'tags' => $this->faker->randomElement(['Abra', 'Cadabra', 'Funciona', 'Futebol']), */
            'tags' => $this->faker->randomElement($this->gerarArray()),
            //'user_id' => $this->faker->randomElement(rand(1,10)),
            //'criador' => $this->faker->randomElement(['Fulano', 'Tiririca', 'Pelé']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
