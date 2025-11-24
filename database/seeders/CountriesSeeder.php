<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //iso3 standard country codes
        Country::insert([
            [
                'name' => 'United States of America',
                'country_code' => 'USA'
            ],
            [
                'name' => 'Canada',
                'country_code' => 'CAN'
            ],
            [
                'name' => 'Germany',
                'country_code' => 'DEU'
            ],
            [
                'name' => 'France',
                'country_code' => 'FRA'
            ],
            [
                'name' => 'United Kingdom',
                'country_code' => 'GBR'
            ],
            [
                'name' => 'Spain',
                'country_code' => 'ESP'
            ],
            [
                'name' => 'Italy',
                'country_code' => 'ITA'
            ],
            [
                'name' => 'Greenland',
                'country_code' => 'GRL'
            ],
            [
                'name' => 'Mexico',
                'country_code' => 'MEX'
            ],
        ]);
    }
}
