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
    private string $store; //keep array len below 24
    /**
     * Create a new job instance.
     */
    public function __construct($ids,$store)
    {
        $this->ids = $ids;
        $this->store = $store;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $token = AC::code_valid($this->store);
        EH::bulkCreateOrReplaceInventory($token,$this->ids);
        EH::bulk_create_offer($token,$this->ids);
    }
}
