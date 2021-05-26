<?php

namespace Database\Seeders;

use App\Models\Flavor;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');

        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(FlavorSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
