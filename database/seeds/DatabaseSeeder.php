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
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('markers')->insert([
            ['marker_name' => "Hiro"],
            ['marker_name' => "Kanji"],
            ['marker_name' => "A"],
            ['marker_name' => "B"],
            ['marker_name' => "C"],
            ['marker_name' => "D"],
            ['marker_name' => "F"],
            ['marker_name' => "G"],
            ['marker_name' => "M"],
            ]);
    
    }
}
