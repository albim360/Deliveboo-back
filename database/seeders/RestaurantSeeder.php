<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Product;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        
        $productIds = Product::pluck('id')->all();
        $typology_Ids = Typology::pluck('id')->all();
        $companyNames = ['Zia Restaurant ','daGorini',' Marotta Ristorante',' Dina','Condividere',' L’Argine a Vencò','Ristorante Villa Maiella','Antica Osteria Nonna Rosa','Gambero Rosso','Colline Ciociare','Abocar Due Cucine','Re Santi e Leoni','Oasis Sapori Antichi','Dalla Gioconda'];

        for ($i = 0; $i < 20; $i++) {
            $restaurant = new Restaurant();
            $restaurant->company_name = $companyNames[array_rand($companyNames)];
            $restaurant->company_name = $faker->address;
            $restaurant->vat_number = (string) $faker->randomNumber(5, true);
            $restaurant->telephone = $faker->unique()->phoneNumber;
            $restaurant->description = $faker->text; 
           
            $restaurant->product_id = $faker->randomElement($productIds);
            $restaurant->save();

            $restaurant->typologies()->attach($faker->randomElement($typology_Ids, $faker->numberBetween(1, 2)));
        }
    }
}
