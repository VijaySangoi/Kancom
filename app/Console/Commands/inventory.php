<?php

namespace App\Console\Commands;

use App\Models\Token as Tk;
use Illuminate\Console\Command;
use App\Http\Controllers\Helper\EbayHelper as EB;

class inventory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raidensoft:inventory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $rec = new Tk();
        // $rec->token_type = true;
        // $rec->token = 'v^1.1#i^1#p^3#r^1...XzMjRV4xMjg0';
        // $rec->refresh_token = "v^1.1#i^1#p^3#r^1...zYjRV4xMjg0";
        echo now();
        $now = now()->addSeconds(7200);
        // $rec->expire = $now;
        // $rec->save();
        $tk = Tk::select('*')->where('expire','>',now())->first();
        EB::bulkCreateOrReplaceInventory($tk->token);
        var_dump($tk);
    }
}
