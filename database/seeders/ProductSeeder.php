<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$restaurantIds = Restaurant::pluck('id')->all();
        $products =  [
            [
                "name" => "Pizza Margherita",
                "price" => 6.00,
                "description" => "descizione...",
                "restaurant_id"=> 1,
            ],
            [
                "name" => "kebab",
                "price" => 5.00,
                "description" => "descizione...",
                "restaurant_id"=> 2,
            ],
            [
                "name" => "Spaghetti allo scoglio",
                "price" => 12.00,
                "description" => "descizione...",
                "restaurant_id"=> 3,
            ],
            [
                "name" => "Pasta con ragù alla genovese",
                "price" => 8.00,
                "description" => "descizione...",
                "restaurant_id"=> 4,
            ],
            [
                "name" => "Ravioli al ragù",
                "price" => 10.00,
                "description" => "descizione...",
                "restaurant_id"=> 5,
            ],
            [
                "name" => "Ravioli al ragù bianco",
                "price" => 10.00,
                "description" => "descizione...",
                "restaurant_id"=> 4,
            ],
            [
                "name" => "Panino con lampredotto",
                "price" => 7.00,
                "description" => "descizione...",
                "restaurant_id"=> 2,
            ],
            [
                "name" => "Trippa",
                "price" => 7.00,
                "description" => "descizione...",
                "restaurant_id"=> 3,
            ],
            [
                "name" => "Carbonara",
                "price" => 8.00,
                "description" => "descizione...",
                "restaurant_id"=> 1,
            ],
            [
                "name" => "Cacio e pepe",
                "price" => 8.00,
                "description" => "descizione...",
                "restaurant_id"=> 4,
            ],
            [
                "name" => "Gricia",
                "price" => 8.00,
                "description" => "descizione...",
                "restaurant_id"=> 7,
            ],
            [
                "name" => "Amatriciana",
                "price" => 8.00,
                "description" => "descizione...",
                "restaurant_id"=> 7,
            ],
            [
                "name" => "Pappa al pomodoro",
                "price" => 6.00,
                "description" => "descizione...",
                "restaurant_id"=> 3,
            ],
            [
                "name" => "Panzanella",
                "price" => 6.00,
                "description" => "descizione...",
                "restaurant_id"=> 4,
            ],
            [
                "name" => "Pastiera",
                "price" => 10.00,
                "description" => "descizione...",
                "restaurant_id"=> 2,
            ],
        ];
        
        foreach ($products as $product){
            
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->slug = Str::slug($product['name'], '-');
            $newProduct->price = $product['price'];
            $newProduct->description = $product['description'];
            $newProduct->restaurant_id = $product['restaurant_id'];

            //$newProduct->restaurant_id = $faker->randomElements($restaurantIds);
            $newProduct->save();
        }
    }
}
