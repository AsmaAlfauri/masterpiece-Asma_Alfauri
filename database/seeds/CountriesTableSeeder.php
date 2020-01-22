<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Aqaba',
        ]);
        
        DB::table('countries')->insert([
            'name' => 'Ajloun',
        ]);

        DB::table('countries')->insert([
            'name' => 'Jerash',
        ]);

        DB::table('countries')->insert([
            'name' => 'Madaba',
        ]);

        DB::table('countries')->insert([
            'name' => 'Amman',
        ]);

        DB::table('countries')->insert([
            'name' => 'Zarqa',
        ]);

        DB::table('countries')->insert([
            'name' => "Ma'an",
        ]);

        DB::table('countries')->insert([
            'name' => 'Irbid',
        ]);

        DB::table('countries')->insert([
            'name' => 'Mafraq',
        ]);

        DB::table('countries')->insert([
            'name' => 'Al-Balqa',
        ]);

        DB::table('countries')->insert([
            'name' => 'Tafila',
        ]);

        DB::table('countries')->insert([
            'name' => 'Karak',
        ]);
    }
}
