<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'idNum' => $this->faker->numerify('P##########'),
            'name' =>  $this->faker->name(),
            'residence' =>  $this->faker->city(),
            'email' =>  $this->faker->email(),
            'dob' => $this->faker->date(),
            'gender' =>  $this->faker->randomElement(['Male','Female']),
            'phone' =>  $this->faker->unique()->numerify('0244######'),



        ];
    }
}
