<?php

namespace Database\Seeders;

use App\Models\Flavor;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Product;
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
        Product::factory(100)->create()->each(function(Product $product){
            Image::factory(4)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
        });

        $products = Product::all();

        Ingredient::factory(20)->create();

        foreach ($products as $product) {
            
            $ingredients = Ingredient::all()->random();

            $product->ingredients()->attach($ingredients->id);
        }
    }
}
