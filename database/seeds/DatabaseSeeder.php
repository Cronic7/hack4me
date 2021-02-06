<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    $this->call(UserSeeder::class);
         $this->call(BountyCategorySeeder::class);
         $this->call(BountySeeder::class);
         $this->call(PostCategory::class);
         $this->call(PostSeeder::class);
         $this->call(UserHackerSeeder::class);
         $this->call(UserBusinessSeeder::class);
    }
}
