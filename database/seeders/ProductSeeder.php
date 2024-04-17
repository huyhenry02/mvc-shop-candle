<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/product.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Product::create([
                'name' => $item->name,
                'price' => $item->price,
                'description' => $item->description,
                'sale' => $item->sale,
                'images' => $item->images,
            ]);
        }
    }
}
