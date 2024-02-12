<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Task::factory(20)->create();
         \App\Models\Book::factory(12)->create()->each (function ($book){
            $numReviews=random_int(5,30);
            \App\Models\Review::factory()->count($numReviews)->good()->for($book)->create();
         });
         \App\Models\Book::factory(15)->create()->each (function ($book){
            $numReviews=random_int(5,30);
            \App\Models\Review::factory()->count($numReviews)->average()->for($book)->create();
         });
         \App\Models\Book::factory(10)->create()->each (function ($book){
            $numReviews=random_int(5,30);
            \App\Models\Review::factory()->count($numReviews)->bad()->for($book)->create();
         });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
