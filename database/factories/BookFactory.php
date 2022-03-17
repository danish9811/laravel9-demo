<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [

            'title' => $this->faker->word(),
            'author' => $this->faker->name(),
            'publisher_id' => $this->faker->numberBetween(1000, 9999),
            'isbn' => $this->faker->isbn13(),
            'price' => $this->faker->randomFloat(2, 20, 90)

        ];
    }
}
