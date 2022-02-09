<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name, //nombre aleatorio en inglés
            'precio'=>$this->faker->randomNumber(3,false), //número con 3 digitos máximo
            'detalle'=>$this->faker->paragraph(), //Texto con varias líneas
            'imagen'=>$this->faker->name.$this->faker->randomElement(['.jpg','.png','.gif']) //nombre aleatorio en inglés mas extensión
        ];
    }
}
