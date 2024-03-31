<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->title = 'Heren';
        $category->slug = 'heren';
        $category->save();

        $category = new Category;
        $category->title = 'Dames';
        $category->slug = 'dames';
        $category->save();

        $category = new Category;
        $category->title = 'Kinderen';
        $category->slug = 'kinderen';
        $category->save();

        $product = new Product;
        $product->category_id = 1;
        $product->title = 'Test Product 1';
        $product->slug = 'test_product_1';
        $product->price = 25;
        $product->save();

        $product = new Product;
        $product->category_id = 1;
        $product->title = 'Test Product 2';
        $product->slug = 'test_product_2';
        $product->price = 25;
        $product->save();

        $product = new Product;
        $product->category_id = 1;
        $product->title = 'Test Product 3';
        $product->slug = 'test_product_3';
        $product->price = 25;
        $product->save();

        $product = new Product;
        $product->category_id = 2;
        $product->title = 'Test Product 4';
        $product->slug = 'test_product_4';
        $product->price = 25;
        $product->save();
    }
}
