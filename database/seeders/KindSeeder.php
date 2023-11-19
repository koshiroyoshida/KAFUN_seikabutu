<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kinds')->insert([
            'name' => 'スギ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'ヒノキ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'イネ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'シラカンバ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'ブタクサ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'ヨモギ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'ハンノキ花粉',//花粉の入力
         ]);
         DB::table('kinds')->insert([
            'name' => 'カナムグラ花粉',//花粉の入力
         ]); 
    }
}
