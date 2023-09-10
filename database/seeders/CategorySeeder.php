<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $categorios = [
            [
                'name' => 'Category 1',
                'parent_id' => 2,
            ],
            [
                'name' => 'Category 2',
                'parent_id' => 4,
            ],
            [
                'name' => 'Category 3',
                'parent_id' => 5,
            ],
            [
                'name' => 'Category 4',
                'parent_id' => 0,
            ],
            [
                'name' => 'Category 5',
                'parent_id' => 1,
            ],
            [
                'name' => 'Category 6',
                'parent_id' => 0,
            ],
            [
                'name' => 'Category 7',
                'parent_id' => 3,
            ]
        ];
        Category::insert($categorios);
    }
}
