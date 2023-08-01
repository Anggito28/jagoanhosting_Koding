<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registration_number' => $this->faker->numberBetween(30000000, 400000000),
            'name' => $this->faker->name(),
            'nik' => $this->faker->numberBetween(30000000, 400000000),
            'jkn' => $this->faker->numberBetween(30000000000, 400000000),
            'job' => $this->faker->jobTitle(),
            'age' => $this->faker->numberBetween(1, 70),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'name_parents' => $this->faker->name(),
            'additional_information' => $this->faker->text(),
            'category_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
