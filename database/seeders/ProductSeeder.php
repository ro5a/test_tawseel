<?php

namespace Database\Seeders;

use App\Models\Filter;
use App\Models\FilterItem;
use App\Models\HomeLink;
use App\Models\OptionDetail;
use App\Models\OrderSection;
use App\Models\Product;
use App\Models\ProductFilter;
use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            [
                "id" => 1,
                "category_id" => 3,
                "name" =>  "فاونديشن مات من ماركة X",
                "price" =>  2000,
                "quantity" => 10,
                "description" => "فاونديشن مات عالي التغطية ويمنح مظهرًا طبيعيًا للبشرة."
            ],
            [
                "id" => 2,
                "category_id" => 2,
                "name" =>  "كريم بي بي من ماركة Y",
                "price" =>  2000,
                "quantity" => 10,
                "description" => "كريم بي بي يوفر تغطية خفيفة وحماية من الشمس."
            ],
            [
                "id" => 3,
                "category_id" => 1,
                "name" =>  "كريم سي سي من ماركة Z",
                "price" =>  2000,
                "quantity" => 10,
                "description" =>  "كريم سي سي ملون يوحد لون البشرة ويقلل من عيوبها."
            ],

        ];

        foreach ($products as $index => $product) {
            $item = Product::create(
                $product
            );
        }
    }
}
