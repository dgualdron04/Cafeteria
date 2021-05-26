<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;

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
        $categories = [
            [
                'name' => 'Bebidas',
                'slug' => Str::slug('Bebidas'),
                'icon' => '<i class="fas fa-mug-hot"></i>',
            ],
            [
                'name' => 'Postres',
                'slug' => Str::slug('Postres'),
                'icon' => '<i class="fas fa-ice-cream"></i>',
            ],
            [
                'name' => 'Snacks',
                'slug' => Str::slug('Snacks'),
                'icon' => '<i class="fas fa-hotdog"></i>',
            ]
        ];


        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}
