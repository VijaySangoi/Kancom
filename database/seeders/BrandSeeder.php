<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
                [
                    'name' => 'Whirlpool',
                    'brand_code' => 'WHI'
                ],
                [
                    'name' => 'General Electric',
                    'brand_code' => 'GE'
                ],
                [
                    'name' => 'Frigidaire',
                    'brand_code' => 'FRI'
                ],
                [
                    'name' => 'Electrolux',
                    'brand_code' => 'ELE'
                ],
                [
                    'name' => 'LG',
                    'brand_code' => 'LG'
                ],
                [
                    'name' => 'Samsung',
                    'brand_code' => 'SAM'
                ],
                [
                    'name' => 'Bosch',
                    'brand_code' => 'BOS'
                ],
                [
                    'name' => 'KitchenAid',
                    'brand_code' => 'KTA'
                ],
                [
                    'name' => 'Maytag',
                    'brand_code' => 'MAY'
                ],
                [
                    'name' => 'Amana',
                    'brand_code' => 'AMA'
                ],
                [
                    'name' => 'Kenmore',
                    'brand_code' => 'KEN'
                ],
                [
                    'name' => 'Hotpoint',
                    'brand_code' => 'HPT'
                ],
                [
                    'name' => 'Jenn-Air',
                    'brand_code' => 'JEN'
                ],
                [
                    'name' => 'Roper',
                    'brand_code' => 'ROP'
                ],
                [
                    'name' => 'Magic Chef',
                    'brand_code' => 'MGC'
                ],
                [
                    'name' => 'Haier',
                    'brand_code' => 'HAI'
                ],
                [
                    'name' => 'Sub Zero',
                    'brand_code' => 'SUB'
                ],
                [
                    'name' => 'Wolf',
                    'brand_code' => 'WLF'
                ],
                [
                    'name' => 'Viking',
                    'brand_code' => 'VIK'
                ],
                [
                    'name' => 'Speed Queen',
                    'brand_code' => 'SQ'
                ],
                [
                    'name' => 'Crosley',
                    'brand_code' => 'CRO'
                ],
                [
                    'name' => 'Midea',
                    'brand_code' => 'MID'
                ],
                [
                    'name' => 'Admiral',
                    'brand_code' => 'ADM'
                ],
                [
                    'name' => 'Westinghouse',
                    'brand_code' => 'WES'
                ],
                [
                    'name' => 'Thermador',
                    'brand_code' => 'THM'
                ],
                [
                    'name' => 'Gaggenau',
                    'brand_code' => 'GAG'
                ],
                [
                    'name' => 'Blomberg',
                    'brand_code' => 'BLO'
                ],
                [
                    'name' => 'Fisher & Paykel',
                    'brand_code' => 'F&P'
                ],
                [
                    'name' => 'Avanti',
                    'brand_code' => 'AVA'
                ],
                [
                    'name' => 'Danby',
                    'brand_code' => 'DAN'
                ],
                [
                    'name' => 'Summit',
                    'brand_code' => 'SUM'
                ],
                [
                    'name' => 'Tappan',
                    'brand_code' => 'TAP'
                ],
                [
                    'name' => 'Insinkerator',
                    'brand_code' => 'INS'
                ],
                [
                    'name' => 'Panasonic',
                    'brand_code' => 'PAN'
                ],
                [
                    'name' => 'Sharp',
                    'brand_code' => 'SHA'
                ],
                [
                    'name' => 'Daewoo',
                    'brand_code' => 'DAE'
                ]
        ]);
    }
}
