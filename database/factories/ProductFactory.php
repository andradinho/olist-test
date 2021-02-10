<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'category_id' => function() {
                $fakeCategory = Category::factory()->make();
             
                return Category::firstOrCreate(['name' => $fakeCategory->name])->id;
             },
            'price' => $this->faker->numberBetween(1.99, 49,99)
        ];
    }
}
