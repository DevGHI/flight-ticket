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
        $array =array('Yangon','Mandalay','Nay Pyi Taw','Taunggyi','Myitkyina','Loikaw','Pa-an','Mawlamyine',
                'Kawthaung','Dawei','Myeik','Kyaing Tong','Sittwe','Thandwe','Bhamo','Pathein','Nyaung-U',
                'Kyaukpyu','Lashio','Heho', 'Tachilek','Putao');

        $new_array = count($array);
        for ($i=0; $i < $new_array ; $i++) { 
            DB::table('cities')->insert([
                'name'=>$array[$i]
            ]);
        }

    }
}
