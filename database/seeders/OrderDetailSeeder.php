<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/order_detail.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            OrderDetail::create([
                'order_id' => $item->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'sub_total' => $item->sub_total,
            ]);
        }
    }
}
