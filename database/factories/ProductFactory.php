<?php

namespace Database\Factories;

use App\Models\Flavor;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;

        $brand = $category->brands->random();

        $flavor = Flavor::all()->random();

        $user = User::all()->random();

        $quantity = rand(10,30);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'quantity' => $quantity,
            'status' => $this->faker->randomElement([1,2]),
            'brand_id' => $brand->id,
            'subcategory_id' => $subcategory->id,
            'flavor_id' => $flavor->id,
            'user_id' => $user->id
        ];
    }
}
