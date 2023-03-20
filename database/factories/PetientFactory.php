<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'petient_fname' => $this->faker->text(15),
            'petient_lname' => $this->faker->text(15),
            'patient_age' => $this->faker->randomDigit(),
            'patient_gender' => $this->faker->randomDigit(20),
            'category_id' => $this->faker->randomDigit(20),
            'patient_number' => $this->faker->randomDigit(10),
            'is_active' => $this->faker->randomDigit(4),
            'created_at' =>$this->faker->dateTime()->format('Y-m-d H:i:s'),
            'updated_at' => $this->faker->dateTime()->format('Y-m-d H:i:s')
        ];

    }
}
