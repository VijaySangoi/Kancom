<?php
namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\EbayStore;
use App\Models\UserStore;
use Illuminate\Support\Facades\Auth;

class HeaderComposer
{
    public function compose(View $view): void
    {
        if(Auth::check())
        {
            $user_store = UserStore::where('user_id',Auth::user()->id)->first();
            $user_store = EbayStore::where('id',$user_store->store_id)->first();
            $store = EbayStore::get(); 
            $view->with('stores', $store)->with('user_store',$user_store);
        }
    }
}