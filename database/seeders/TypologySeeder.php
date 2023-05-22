<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Typology;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = ['italiano','americana','indiana','cinese','giapponese','coreana','messicana','nepalese','malese','domenicana','spagnola','turca','argentina','brasiliana','hawaiana','greca','rumena','moldava'];
        foreach($typologies as $typology){
           
            $new_typology = new Typology();
            $new_typology->category_kitchen = $typology;
            $new_typology->save();
            
        }
    }
}