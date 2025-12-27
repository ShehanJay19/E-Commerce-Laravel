<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            [
                'name' => 'Wireless Mouse',
                'price' => 29.99,
                'sku' => 'WM-100',
                'stock' => 50,
                'category_slug' => 'accessories',
            ],
            [
                'name' => 'Laptop 14"',
                'price' => 899.00,
                'sku' => 'LP-1400',
                'stock' => 15,
                'category_slug' => 'computers',
            ],
            [
                'name' => 'Bluetooth Speaker',
                'price' => 49.50,
                'sku' => 'BS-250',
                'stock' => 30,
                'category_slug' => 'electronics',
            ],
        ];

        foreach ($catalog as $item) {
            $category = Category::where('slug', $item['category_slug'])->first();
            Product::firstOrCreate([
                'slug' => Str::slug($item['name']),
            ], [
                'name' => $item['name'],
                'description' => null,
                'price' => $item['price'],
                'sku' => $item['sku'],
                'stock' => $item['stock'],
                'status' => 'active',
                'category_id' => $category?->id,
            ]);
        }
    }
}
