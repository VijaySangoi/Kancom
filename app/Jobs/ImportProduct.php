<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Brand;

class ImportProduct implements ShouldQueue
{
    use Queueable;
    private  $path;

    /**
     * Create a new job instance.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $file = file($this->path);
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
                $quantity = ($rec[15]=='')?0:$rec[5];
                $images = $rec[30];
                $price = ($rec[26]=='')?0:$rec[26];
                $condition = 1;
                $condition_description = "Mint condition. Kept in styrofoam case. Never displayed.";
                // var_dump($rec);
                try{
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
                catch(Exception $e)
                {
                    Log::info($e->getMessage());
                }
            }
        }
    }
}
