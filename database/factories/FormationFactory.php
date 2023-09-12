<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = collect(['MMI', 'QLIO', 'GEII']);
        $promo = collect(['BUT1', 'BUT2', 'BUT3']);
        $option = collect(['DW', 'SCN', 'CREA']);

        return [
            'categorie' => fake()->word(),
            'name' =>  $name->random(),
            'promotion'=> $promo->random(),
            'num_tp'=> fake()->numberBetween(1, 5), // $this->faker->numberBetween(1, 10
            'num_td'=> fake()->numberBetween(1, 10), // $this->faker->numberBetween(1, 10
            'option'=> $option->random(),
        ];
    }
}
