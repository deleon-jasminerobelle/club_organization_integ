<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Academic', 'description' => 'Academic organizations and societies'],
            ['name' => 'Cultural', 'description' => 'Cultural and arts organizations'],
            ['name' => 'Sports', 'description' => 'Sports and recreational organizations'],
            ['name' => 'Technical', 'description' => 'Technical and engineering organizations'],
            ['name' => 'Social', 'description' => 'Social and community service organizations'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
