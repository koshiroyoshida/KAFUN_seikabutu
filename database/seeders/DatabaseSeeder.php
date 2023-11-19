<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(AreaSeeder::class);//Seederの前にテーブル名
        $this->call(KindSeeder::class);
        $this->call(UserSeeder::class);
    }
}
