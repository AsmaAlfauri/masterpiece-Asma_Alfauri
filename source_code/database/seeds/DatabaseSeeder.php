<?php

use Illuminate\Database\Seeder;
use App\Blog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        // $this->call(BlogsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
    }
}
