<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            FlightSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            BookCopySeeder::class,
            MemberSeeder::class,
            LoanSeeder::class,
        ]);

        // for ($i = 0; $i < 20; $i++) {
        //     DB::table('authors')->insert([
        //         'name' =>Str::random(10),
        //         'bio' =>Str::random(10),
        //     ]);
        // }

        // User::factory(10)->create();
        
        
        
    }
}
