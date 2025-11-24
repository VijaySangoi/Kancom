<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\AuthCode as AC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helper\EbayHelper as EH;
use App\Models\EbayStore as ES;
use App\Models\Token as Tk;
use Illuminate\Support\Facades\DB;

class AuthCodeController extends Controller
{
    public function code(Request $request)
    {
        $code = $_GET['code'];
        $expire = $_GET['expires_in'];
        $state = $_GET['state'];
        $user_id = Auth::id();
        $rec = new AC();
        $rec->ebay_store_id = $state;
        $rec->user_id = $user_id;
        $rec->state = $state;
        $rec->code = $code;
        $rec->expires_in = $expire;
        $rec->save();
        $store_list = ES::select('ebay_redirect_uri')->where('id',$state)->first();
        $id = $rec->id;
        $res = EH::getAccessToken($code,$store_list->ebay_redirect_uri);
        $rec = new Tk();
        $rec->token_type = true;
        $rec->token = $res->access_token;
        $rec->refresh_token = $res->refresh_token;
        $rec->expire = now()->addSeconds($res->expires_in);
        $rec->code_id = $id;
        $rec->save();
        return view('dashboard');
    }
    public static function code_valid()
    {
        $token = DB::table('tokens')
        ->first();
        if($token->expire < now())
        {
            $res = ES::refreshToken($token->refresh_token);
            DB::table('tokens')
            ->where('id',$token->id)
            ->update([
                'token' => $res->access_token,
                'expire' => now()->addSeconds($res->expires_in)
            ]);
        }
        $token = DB::table('tokens')
        ->first();
        return $token->token;
        //token always valid
    }
}
