<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = File::get(storage_path('data/customer/customer_demo_data.json'));

        $data = json_decode($jsonString, true);
        foreach ($data as $item) {
            $customer = [];
            $customer['email'] = $item['email'];
            if ($customer_data = Customer::updateOrCreate($customer, $item)) {

            }
        }
    }
}
