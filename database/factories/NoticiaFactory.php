<?php

namespace Database\Factories;

use App\Models\Noticia;
use App\Models\AutorNoticia;
use App\Models\CategoriaNoticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->text(min:1500),
            'imagen' => $this->faker->text(),
            'autor_id'=> \App\Models\AutorNoticia::all()->random()->id,
            'categoria_id' => \App\Models\CategoriaNoticia::all()->random()->id,
        ];
    }

}
