<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrdersSeeder extends Seeder
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
            $new_order->total_payment = $faker->randomFloat(2, 0);
            $new_order->full_name = $faker->randomElements(['Pietro Maione', 'Sara Gherbassi', 'Alberto Zappala', 'Giovanni Righini', 'Cristian Bruno', 'Francesco Punta']);
            $new_order->telephone = $faker->phoneNumber();
            $new_order->address = $faker->address();
            $new_order->email = $faker->email();
            $new_order->save();
        }

    }
}
