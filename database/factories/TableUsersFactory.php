<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TablesUsers>
 */
class TableUsersFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'office' => $this->faker->country(),
            'age' => $this->faker->numberBetween(20, 70)
        ];
    }
}
