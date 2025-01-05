<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (['Man','Kitchen','Home','Women','Outdoor','Floor','Furniture'] as $category) {
            Category::factory()->create(['name' => $category]);
        }
        Product::factory()
            ->count(7)
            ->create();

        $products = Product::all();
        foreach ($products as $product) {
            $product->categories()->sync(Category::all()->random(3)->pluck('id'));
        }

    }
}
