<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array = [
            [
                "id" => 1,
                "name" =>  "مستحضرات المكياج للوجه"
            ],
            [
                "id" => 2,
                "name" =>  "مستحضرات المكياج للعيون"
            ],
            [
                "id" => 3,
                "name" =>  "مستحضرات المكياج للشفاه"
            ],

        ];

        for ($i = 0; $i < count($array); $i++) {
            Category::create($array[$i]);
        }
    }
}
