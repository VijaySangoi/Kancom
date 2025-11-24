<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'sku' => '8184859',
                'supplier_id' => '1',
                'title' => '1 of 8184859 Whirlpool Range Oven Door Trim Kit (2 Sides, 1 Bottom)',
                'shortDescription' => 'Oven Door Trim Kit',
                'description' => 'This Electric Range Door Trim Kit secures the sides and bottom of the oven door glass in the door of the appliance. This trim kit is white in color and designed specifically to be used with white oven models. The package includes (2) side trim pieces and',
                'imageUrls' => 'https://reliable-parts-distributors.com/wordpress/wp-content/uploads/2025/07/1-of-8184859-oven-door-trim-1-of-8184859-oven-door-trim.jpg,https://reliable-parts-distributors.com/wordpress/wp-content/uploads/2025/07/Reliable-parts-hub-photos.png',
                'condition' => 1,
                'conditionDescription' => 'Mint condition. Kept in styrofoam case. Never displayed.',
                'quantity' => '2',
                'is_substitute' => '0',
                'wholesale_price' => '1',
                'retail_price' => '1',
                'extra_charges' => '1',
                'total_price' => '1',
                'discounted_price' => '1',
            ],
            [
                'sku' => 'WB13K21',
                'supplier_id' => '1',
                'title' => '1 of WB13K21 GE Oven Igniter with 7 Leads',
                'shortDescription' => 'Oven Igniter with 7 Leads',
                'description' => 'WB13K21 is an original equipment manufactured (OEM) part. Enhance your oven\'s performance with this high-quality igniter, designed to replace worn or faulty units in GE, Hotpoint, Haier, Monogram, and Café appliances. Featuring seven leads, this component',
                'imageUrls' => 'https://reliable-parts-distributors.com/wordpress/wp-content/uploads/2025/07/OEM-Genuine-wb13k21-ge-oven-igniter-with-7-leads.jpg,https://reliable-parts-distributors.com/wordpress/wp-content/uploads/2025/07/cd331889-1f06-417e-9857-4b644516755c-1.jpg',
                'condition' => 3,
                'conditionDescription' => 'used for 6 month, electrically tested after refurbishment',
                'quantity' => '2',
                'is_substitute' => '1',
                'wholesale_price' => '1',
                'retail_price' => '1',
                'extra_charges' => '1',
                'total_price' => '1',
                'discounted_price' => '1',
            ],
        ]);
    }
}
