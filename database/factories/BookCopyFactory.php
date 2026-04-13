<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookCopy>
 */
class BookCopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' =>Book::factory(),
            'barcode' => $this->faker->unique()->isbn13(),
            'status' => $this->faker->randomElement(['available', 'loaned', 'repair', 'lost']),
        ];
    }
}
