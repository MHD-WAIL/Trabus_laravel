<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            "number" => $this->faker->uuid(),
            "card_type" => $this->faker->randomElement(['Istanbul_Card', 'blue_card', 'electronic_card']),
            "balance"=>$this->faker->numberBetween($min = 100, $max = 300)

            //"card_type_id" => rand(1, 2)
        ];
    }
}
