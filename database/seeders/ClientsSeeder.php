<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Propaganistas\LaravelPhone\PhoneNumber;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones = json_decode(file_get_contents(__DIR__ .'/files/phones.json'));
        foreach ($phones as $row) {
            $normalize = str_replace('+', '', PhoneNumber::make($row->PhoneNumber, 'RU')->formatE164());
            Client::create([
                'phone' => $normalize,
            ]);
        }
    }
}
