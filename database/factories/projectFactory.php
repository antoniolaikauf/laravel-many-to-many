<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\project>
 */
class projectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // factory rimangono uguale si mettono il nome delle colonne a cui devono riferirsi e si specifica quali dati mettere all'interno
        return [
            'nome' => fake()->word(),
            'inizio_progetto' => fake()->date(),
            'descrizione' => fake()->paragraph(),
        ];
    }
}
