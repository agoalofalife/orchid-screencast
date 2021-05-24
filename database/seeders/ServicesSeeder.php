<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'замена шин',
            'покупка',
            'балансировка',
            'ремонт'
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service
            ]);
        }
    }
}
