<?php

namespace Database\Seeders;

use App\Models\Marketing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Alfandy',
            ],
            [
                'name' => 'Mery',
            ],
            [
                'name' => 'Danang',
            ],
        ];

        foreach ($data as $value) {
            Marketing::insert([
                'name' => $value['name'],
            ]);
        }
    }
}
