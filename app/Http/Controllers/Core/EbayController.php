<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\EbayStore;
use Illuminate\Http\Request;

class EbayController extends Controller
{
    public function manage_acc(Request $req)
    {
        $store_list = EbayStore::get();
        return view('ebay.manage')->with("stores",$store_list);
    }
    public function manage_acc_new(Request $req)
    {
        if($req->isMethod('POST')){
            $record = new EbayStore([
                'store_name'=>$req['Name'],
                'ebay_client_id'=>$req['ClientId'],
                'ebay_dev_id'=>$req['DevId'],
                'ebay_client_secret'=>$req['ClientSecret'],
                'ebay_redirect_uri'=>$req['RedirectUri']
            ]);
            $record->save();
        }
        if($req->isMethod('DELETE'))
        {
            $record = EbayStore::find($req['DeleteId']);
            if($record)
            {
                $record->delete();
            }
        }
        $store_list = EbayStore::get();
        return view('ebay.ebay')->with("stores",$store_list);
    }
}
