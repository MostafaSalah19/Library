<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\BookCopy;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => Member::factory(),
            'book_copy_id' => BookCopy::factory(),
            'borrowed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'due_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'returned_at' => $this->faker->optional()->dateTimeBetween('now', '+2 months'),
            'fine' => $this->faker->randomFloat(2, 0, 50),
        ];
    }
}
