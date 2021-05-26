<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //Bebidas
            [
                'category_id' => 1,
                'name' => 'Bebidas calientes',
                'slug' => Str::slug('Bebidas calientes')
            ],
            [
                'category_id' => 1,
                'name' => 'Bebidas frías',
                'slug' => Str::slug('Bebidas frías')
            ],
            [
                'category_id' => 1,
                'name' => 'Cocteles',
                'slug' => Str::slug('Cocteles')
            ],
            [
                'category_id' => 1,
                'name' => 'Jugos Naturales',
                'slug' => Str::slug('Jugos Naturales')
            ],
            //Postres
            [
                'category_id' => 2,
                'name' => 'Pasteles de frutas',
                'slug' => Str::slug('Pasteles de frutas')
            ],
            [
                'category_id' => 2,
                'name' => 'Tartas',
                'slug' => Str::slug('Tartas')
            ],
            [
                'category_id' => 2,
                'name' => 'Helados',
                'slug' => Str::slug('Helados')
            ],
            [
                'category_id' => 2,
                'name' => 'Pastelitos',
                'slug' => Str::slug('Pastelitos')
            ],
            //Snacks
            [
                'category_id' => 3,
                'name' => 'Snacks crujientes',
                'slug' => Str::slug('Snacks crujientes')
            ],
            [
                'category_id' => 3,
                'name' => 'Snacks dulces',
                'slug' => Str::slug('Snacks dulces')
            ],
            [
                'category_id' => 3,
                'name' => 'Snacks salado',
                'slug' => Str::slug('Snacks salado')
            ],
            [
                'category_id' => 3,
                'name' => 'Snacks cremosos',
                'slug' => Str::slug('Snacks cremosos')
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
        
    }
}
