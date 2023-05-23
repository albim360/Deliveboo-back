<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Product;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        
        //$productIds = Product::pluck('id')->all();
        $typology_Ids = Typology::all()->pluck('id')->all();
        
        $companyNames = ['Zia Restaurant ','daGorini',' Marotta Ristorante',' Dina','Condividere',' L’Argine a Vencò','Ristorante Villa Maiella','Antica Osteria Nonna Rosa','Gambero Rosso','Colline Ciociare','Abocar Due Cucine','Re Santi e Leoni','Oasis Sapori Antichi','Dalla Gioconda'];

        foreach ($companyNames as $companyName) {

            $restaurant = new Restaurant();

            $restaurant->company_name = $companyName;
            $restaurant->address = $faker->address;
            $restaurant->vat_number = mt_rand(10000000000, 99999999999);
            $restaurant->telephone = $faker->unique()->phoneNumber;
            $restaurant->description = $faker->text; 
            $restaurant->slug = Str::slug($restaurant->company_name, '_');
           
            //$restaurant->product_id = $faker->randomElement($productIds);
            $restaurant->save();

            $restaurant->typologies()->attach($faker->randomElement($typology_Ids, $faker->numberBetween(1, 2)));
        }
    }
}
