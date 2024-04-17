<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/order.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Order::create([
                'code' => $item->code,
                'user_id' => $item->user_id,
                'total' => $item->total,
            ]);
        }
    }
}
