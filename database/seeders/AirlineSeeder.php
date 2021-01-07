<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airlines')->insert([
            'name' =>'Air KBZ',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:ATR_72-600_Air_KBZ_(KBZ)_F-WWEV_-_MSN_1085_-_Will_be_XY-AJJ_(9739868889).jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Golden Myanmar Airlines',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:Golden_Myanmar_Airlines_(190182).jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Mann Yadanarpon Airlines',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:Mann_Yadanarpon_Airlines_ATR_ATR-72-600_(ATR-72-212A).jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Myanmar Airways International',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:Myanmar_Airways_International_Airbus_A320_Spijkers.jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Myanmar National Airlines',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:Myanma_Airways_Fokker_F28_MRD.jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Yangon Airways',
            'logo'=>'https://en.wikipedia.org/wiki/List_of_airlines_of_Myanmar#/media/File:Yangon_Airways_ATR_72-212_MRD-1.jpg'
            ]);
        DB::table('airlines')->insert([
            'name' =>'Malaysia airline',
            'logo'=>'https://themalaysianreserve.com/wp-content/uploads/2017/08/Malaysia-Airlines-MAS.jpg'
            ]);
    }
}
