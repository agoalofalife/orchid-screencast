<?php

namespace Database\Seeders;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RandomUpdatedAtClients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::all()->each(function ($client) {
            $client->update([
             'updated_at' => Carbon::today()->subDays(rand(1, 15)),
             'created_at' => Carbon::today()->subDays(rand(1, 15)),
            ]);
        });
    }
}
