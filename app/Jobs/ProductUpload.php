<?php

namespace App\Jobs;

use App\Http\Controllers\Helper\AuthCodeController as AC;
use App\Http\Controllers\helper\EbayHelper as EH;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductUpload implements ShouldQueue
{
    use Queueable;
    private array $ids;
    private $store_id;
    /**
     * Create a new job instance.
     */
    public function __construct($ids,$store_id)
    {
        $this->ids = $ids;
        $this->store_id = $store_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $token = AC::code_valid($this->store_id);
        EH::bulkCreateOrReplaceInventory($token,$this->ids);
        EH::bulk_create_offer($token,$this->ids);
    }
}
