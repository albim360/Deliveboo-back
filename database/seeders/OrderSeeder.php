<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<20;$i++){
            $new_order = new Order();
            $new_order->date = $faker->dateTime();
            $new_order->total_payment = $faker->randomFloat(2, 0,9999.99);
            $fullName = $faker->randomElement(['Pietro Maione', 'Sara Gherbassi', 'Alberto Zappala', 'Giovanni Righini', 'Cristian Bruno', 'Francesco Punta']);
            $new_order->full_name = $fullName;
            $new_order->telephone = $faker->phoneNumber();
            $new_order->address = $faker->address();
            $new_order->email = $faker->email();
           

            $new_order->save();
            $product = Product::find(1);
            $quantity = rand(1, 100);
            $new_order->products()->attach($product, ['quantity' => $quantity]);
        }

    }
}
