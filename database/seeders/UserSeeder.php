<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = File::get(storage_path('data/admin/admin_demo_data.json'));

        $data = json_decode($jsonString, true);
        foreach ($data as $item) {
            $admin = [];
            $admin['email'] = $item['email'];
            if ($admin_data = User::updateOrCreate($admin, $item)) {
            }
        }
    }
}
