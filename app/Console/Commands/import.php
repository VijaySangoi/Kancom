<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;
use App\Models\Product;

class import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raidensoft:import {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'imports data from wordpress to raidensoft';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('file_path');
        $file = file($path);
        foreach ($file as $key => $value) {
            if ($key > 0) {
                $rec = str_getcsv($value);
                $brn = $rec[40];
                $br = Brand::firstOrCreate(
                    ['brand_code' => $brn],
                    [
                        'name' => ''
                    ]
                );
                $sku = $rec[2];
                $title = $rec[4];
                $short_description = $rec[8];
                $description = $rec[9];
                $quantity = $rec[15];
                $images = $rec[30];
                $price = $rec[26];
                $condition = 1;
                $condition_description = "Mint condition. Kept in styrofoam case. Never displayed.";
                // var_dump($rec);
                $product = Product::firstOrNew(
                    ['sku' => $sku],
                    [
                        'title' => $title,
                        'brand_id' => $br->id,
                        'shortDescription' => $short_description,
                        'description' => $description,
                        'imageUrls' => $images,
                        'condition' => $condition,
                        'conditionDescription' => $condition_description,
                        'quantity' => $quantity
                    ]
                );
                $product->quantity = $quantity;
                $product->total_price = $price;
                $product->save();
            }
        }
    }
}
