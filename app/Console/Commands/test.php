<?php

namespace App\Console\Commands;

use App\Http\Controllers\Helper\AuthCodeController;
use App\Http\Controllers\helper\EbayHelper as EH;
use Illuminate\Console\Command;
use App\Http\Controllers\Helper\AuthCodeController as AC;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrathpad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testing section here';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = AC::code_valid();
        var_dump($token);
        $tmp = EH::bulkCreateOrReplaceInventory($token,[34569,34570]);
        var_dump($tmp);
    }
}
