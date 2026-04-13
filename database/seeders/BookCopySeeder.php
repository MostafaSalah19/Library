<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookCopy;

class BookCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCopy::factory()->count(50)->create();
    }
}
