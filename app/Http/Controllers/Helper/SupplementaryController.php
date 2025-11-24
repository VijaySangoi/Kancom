<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserStore;
use Illuminate\Support\Facades\Auth;

class SupplementaryController extends Controller
{
    public function set_store(Request $req)
    {
        $id = $req->input('store_id');
        $rec = UserStore::where('user_id',Auth::user()->id)->first();
        $rec->store_id = $id;
        $rec->save();
        return redirect()->back();
    }
}
