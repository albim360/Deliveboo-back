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
    public function run(Faker $faker)
    {
        $restaurantIds = Restaurant::pluck('id')->all();
        $products = [
            [
                "name" => "Pizza Margherita",
                "price" => 6.00,
                "description" => "La classica pizza con pomodoro, mozzarella e basilico.",
            ],
            [
                "name" => "Kebab",
                "price" => 5.00,
                "description" => "Piatto di origine turca con carne di agnello o pollo, verdure e salsa.",
            ],
            [
                "name" => "Spaghetti alla carbonara",
                "price" => 9.00,
                "description" => "Pasta condita con uova, pancetta, pecorino e pepe nero.",
            ],
            [
                "name" => "Lasagne al ragù",
                "price" => 10.00,
                "description" => "Piatto di pasta al forno con ragù di carne e besciamella.",
            ],
            [
                "name" => "Cotoletta alla milanese",
                "price" => 12.00,
                "description" => "Cotoletta di vitello impanata e fritta.",
            ],
            [
                "name" => "Gnocchi al pesto",
                "price" => 8.50,
                "description" => "Gnocchi di patate conditi con pesto alla genovese.",
            ],
            [
                "name" => "Tagliatelle ai funghi porcini",
                "price" => 11.00,
                "description" => "Tagliatelle fresche con funghi porcini e prezzemolo.",
            ],
            [
                "name" => "Tiramisù",
                "price" => 7.50,
                "description" => "Dolce al cucchiaio con savoiardi, caffè, mascarpone e cacao.",
            ],
            [
                "name" => "Cannoli siciliani",
                "price" => 8.50,
                "description" => "Dolce siciliano con guscio croccante ripieno di crema di ricotta dolce.",
            ],
            [
                "name" => "Arancini",
                "price" => 4.50,
                "description" => "Palle di riso ripiene e fritte, tipiche della cucina siciliana.",
            ],
            [
                "name" => "Gelato alla vaniglia",
                "price" => 3.50,
                "description" => "Gelato cremoso al gusto di vaniglia.",
            ],
            [
                "name" => "Pasta al pomodoro",
                "price" => 7.00,
                "description" => "Piatto di pasta con salsa di pomodoro fresco e basilico.",
            ],
            [
                "name" => "Bistecca alla fiorentina",
                "price" => 15.00,
                "description" => "Bistecca di manzo alla griglia, tipica della cucina toscana.",
            ],
            [
                "name" => "Insalata caprese",
                "price" => 9.00,
                "description" => "Insalata con pomodori, mozzarella e basilico.",
            ],
            [
                "name" => "Risotto ai frutti di mare",
                "price" => 13.00,
                "description" => "Risotto con frutti di mare come cozze, vongole e gamberi.",
            ],
            [
                "name" => "Burger classico",
                "price" => 8.50,
                "description" => "Hamburger con carne di manzo, formaggio, insalata e pomodoro.",
            ],
            [
                "name" => "Sushi assortito",
                "price" => 15.00,
                "description" => "Assortimento di sushi con vari tipi di pesce e riso.",
            ],
            [
                "name" => "Pollo alla griglia",
                "price" => 10.50,
                "description" => "Petti di pollo marinati e grigliati serviti con contorno di verdure.",
            ],
            [
                "name" => "Insalata di quinoa",
                "price" => 9.50,
                "description" => "Insalata leggera a base di quinoa, verdure fresche e condimento al limone.",
            ],
            [
                "name" => "Crostata di frutta",
                "price" => 7.00,
                "description" => "Torta crostata con base di pasta frolla e ripieno di frutta di stagione.",
            ],
            [
                "name" => "Zuppa di lenticchie",
                "price" => 6.50,
                "description" => "Zuppa calda e saporita con lenticchie, verdure e spezie.",
            ],
            [
                "name" => "Couscous di verdure",
                "price" => 11.50,
                "description" => "Couscous con verdure grigliate e condimento al limone e prezzemolo.",
            ],
            [
                "name" => "Tacos di pollo",
                "price" => 9.00,
                "description" => "Tacos messicani con pollo speziato, salsa e guarnizioni.",
            ],
            [
                "name" => "Pancakes con sciroppo d'acero",
                "price" => 8.00,
                "description" => "Pancakes soffici serviti con sciroppo d'acero e burro.",
            ],
            [
                "name" => "Salmone alla griglia",
                "price" => 13.50,
                "description" => "Filetto di salmone fresco grigliato con contorno di verdure.",
            ],
            [
                "name" => "Cannelloni ricotta e spinaci",
                "price" => 10.00,
                "description" => "Cannelloni ripieni di ricotta e spinaci al sugo di pomodoro.",
            ],
            [
                "name" => "Ratatouille",
                "price" => 9.00,
                "description" => "Piatto vegetariano con verdure grigliate come melanzane, zucchine e peperoni.",
            ],
            [
                "name" => "Cheesecake al cioccolato",
                "price" => 8.50,
                "description" => "Cheesecake cremosa al cioccolato con base di biscotti al cioccolato.",
            ],
            [
                "name" => "Bistecca di tonno",
                "price" => 14.00,
                "description" => "Bistecca di tonno fresco alla griglia con salsa al limone e prezzemolo.",
            ],
            [
                "name" => "Filetto di manzo",
                "price" => 18.00,
                "description" => "Filetto di manzo alla griglia con contorno di patate arrosto.",
            ],
            [
                "name" => "Paella di mare",
                "price" => 16.50,
                "description" => "Piatto spagnolo a base di riso, frutti di mare, pollo e spezie.",
            ],
            [
                "name" => "Curry di pollo",
                "price" => 12.00,
                "description" => "Pollo al curry con latte di cocco, verdure e spezie aromatiche.",
            ],
            [
                "name" => "Tortellini alla panna",
                "price" => 10.50,
                "description" => "Tortellini ripieni di carne serviti con salsa alla panna e prosciutto.",
            ],
            [
                "name" => "Insalata di mare",
                "price" => 13.00,
                "description" => "Insalata fresca con gamberi, calamari, polpo e verdure miste.",
            ],
            [
                "name" => "Pizza ai quattro formaggi",
                "price" => 9.50,
                "description" => "Pizza con una selezione di quattro formaggi vari.",
            ],
            [
                "name" => "Salmone affumicato",
                "price" => 11.00,
                "description" => "Fette di salmone affumicato servite con pane tostato e burro.",
            ],
            [
                "name" => "Gamberoni alla griglia",
                "price" => 15.00,
                "description" => "Gamberoni freschi grigliati con aglio, prezzemolo e olio d'oliva.",
            ],
            [
                "name" => "Insalata di rucola e parmigiano",
                "price" => 8.50,
                "description" => "Insalata di rucola con scaglie di parmigiano e dressing al limone.",
            ],
            [
                "name" => "Risotto alla milanese",
                "price" => 11.50,
                "description" => "Risotto cremoso con zafferano e parmigiano.",
            ],
            [
                "name" => "Pancetta croccante",
                "price" => 6.50,
                "description" => "Fette di pancetta croccante servite con pane e salse.",
            ],
            [
                "name" => "Carpaccio di manzo",
                "price" => 13.50,
                "description" => "Fette sottili di manzo crudo condite con olio d'oliva, limone e rucola.",
            ],
            [
                "name" => "Insalata di frutti di mare",
                "price" => 14.00,
                "description" => "Insalata mista di frutti di mare con dressing leggero.",
            ],
            [
                "name" => "Tortilla di patate",
                "price" => 7.00,
                "description" => "Frittata spagnola con patate e cipolle.",
            ],
            [
                "name" => "Panna cotta",
                "price" => 6.00,
                "description" => "Dolce italiano a base di panna cotta con salsa di frutta.",
            ],
        ];

        foreach ($products as $product) {

            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->slug = Str::slug($product['name'], '-');
            $newProduct->price = $product['price'];
            $newProduct->description = $product['description'];
            //$newProduct->restaurant_id = $product['restaurant_id'];

            $newProduct->restaurant_id = $faker->randomElement($restaurantIds);
            $newProduct->save();
        }
    }
}