<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
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
            'staff_num' => $this->faker->unque()->numerify('S1##23'),
            'full_name' =>  $this->faker->name(),
            'staff_type_id' =>  $this->faker->randomElement(['1','2']),
            'phone_number' =>  $this->faker->unique()->numerify('020#######'),
            'dob' => $this->faker->date(),
            'residence' =>  $this->faker->city(),
            'email' =>  $this->faker->email(),

        ];
    }
}
