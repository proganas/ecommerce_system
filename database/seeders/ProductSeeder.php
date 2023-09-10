<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Product 1',
                'category_id' => 4,
                'price' => 23.41,
            ],
            [
                'name' => 'Product 2',
                'category_id' => 2,
                'price' => 95.01
            ],
            [
                'name' => 'Product 3',
                'category_id' => 1,
                'price' => 36.74
            ],
            [
                'name' => 'Product 4',
                'category_id' => 5,
                'price' => 100.52
            ]
        ];
        Product::insert($products);
    }
}
