<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['name' =>'Yangon']);
        DB::table('cities')->insert(['name' =>'Mandalay']);
        DB::table('cities')->insert(['name' =>'Nay Pyi Taw']);
        DB::table('cities')->insert(['name' =>'Taunggyi']);
        DB::table('cities')->insert(['name' =>'Myitkyina']);
        DB::table('cities')->insert(['name' =>'Loikaw']);
        DB::table('cities')->insert(['name' =>'Pa-an']);
        DB::table('cities')->insert(['name' =>'Mawlamyine']);
        DB::table('cities')->insert(['name' =>'Kawthaung']);
        DB::table('cities')->insert(['name' =>'Dawei']);
        DB::table('cities')->insert(['name' =>'Myeik']);   
        DB::table('cities')->insert(['name' =>'Kyaing Tong']);
        DB::table('cities')->insert(['name' =>'Sittwe']);
        DB::table('cities')->insert(['name' =>'Thandwe']);     
        DB::table('cities')->insert(['name' =>'Bhamo']);
        DB::table('cities')->insert(['name' =>'Pathein']);
        DB::table('cities')->insert(['name' =>'Nyaung-U']);
        DB::table('cities')->insert(['name' =>'Kyaukpyu']);
        DB::table('cities')->insert(['name' =>'Lashio']);
        DB::table('cities')->insert(['name' =>'Heho']);
        DB::table('cities')->insert(['name' =>'Tachilek']);          
        DB::table('cities')->insert(['name' =>'Putao']);  
          
    }
}
