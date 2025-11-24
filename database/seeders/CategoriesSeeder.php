<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'category' => 'Baby, Collectibles, Crafts, Dolls & Bears, Health & Beauty, Pet Supplies, Toys & Hobbies'
            ],
            [
                'category' => 'Books & Magazines'
            ],
            [
                'category' => 'Books & Magazines'
            ],
            [
                'category' => 'Cameras & Photo, Cell Phones & Accessories, Computers/Tablets & Networking, Electronics, Home & Garden, Musical Instruments & Gear, Headphones, Portable Audio & Home Audio, Video Game Consoles, Smart Home'
            ],
            [
                'category' => 'Clothing, Shoes & Accessories: Clothing'
            ],
            [
                'category' => 'Clothing, Shoes & Accessories: Shoes'
            ],
            [
                'category' => 'Clothing, Shoes & Accessories: Jewelry & Watches, Sporting Goods'
            ],
            [
                'category' => 'Clothing, Shoes & Accessories: Underwear'
            ],
            [
                'category' => 'Movies & TV, Music, Video Games'
            ],
            [
                'category' => 'Food & Beverages'
            ],
            [
                'category' => 'Health & Beauty'
            ],
            [
                'category' => 'Motors: Cars & Trucks'
            ],
            [
                'category' => 'Motors: Parts & Accessories'
            ],
            [
                'category' => 'Tires'
            ],
            [
                'category' => 'Non-Fungible Tokens (NFT): Art, Collectibles, Movies & TV, Music, Sports Mem, Cards & Fan Shop, Toys & Hobbies'
            ],
            [
                'category' => 'Trading Cards'
            ]
        ]);
    }
}
