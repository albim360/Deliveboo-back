<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Restaurant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =  [
            [
                "name" => "Pizza Margherita",
                "price" => 6.00,
                "description" => "descizione...",
            ],
            [
                "name" => "kebab",
                "price" => 5.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Spaghetti allo scoglio",
                "price" => 12.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Pasta con ragù alla genovese",
                "price" => 8.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Ravioli al ragù",
                "price" => 10.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Ravioli al ragù bianco",
                "price" => 10.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Panino con lampredotto",
                "price" => 7.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Trippa",
                "price" => 7.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Carbonara",
                "price" => 8.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Cacio e pepe",
                "price" => 8.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Gricia",
                "price" => 8.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Amatriciana",
                "price" => 8.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Pappa al pomodoro",
                "price" => 6.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Panzanella",
                "price" => 6.00,
                "description" => "descizione...",
            ],
            [
                "name" => "Pastiera",
                "price" => 10.00,
                "description" => "descizione...",
            ],
        ];
        

        foreach ($products as $product){
            

            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->price = $product['price'];
            $newProduct->description = $product['description'];
            
            $newProduct->save();
        }
    }
}
