<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['JAKARTA', 'BOGOR', 'BANDUNG', 'SURABAYA', 'SEMARANG'];

        foreach ($cities as $city) {
            City::create(['city_name' => $city]);
        }
    }
}
