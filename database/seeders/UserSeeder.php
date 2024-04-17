<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json/user.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            User::create([
                'name' => $item->name,
                'address' => $item->address,
                'phone' => $item->phone,
                'email' => $item->email,
                'password' => bcrypt($item->password),
                'age' => $item->age,
            ]);
        }
    }
}
