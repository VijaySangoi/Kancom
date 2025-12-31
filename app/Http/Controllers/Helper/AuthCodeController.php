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
use Illuminate\Support\Facades\Log;

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
        $store = ES::where('id',$state)->first();
        $id = $rec->id;
        $res = EH::getAccessToken($store,$code);
        if(property_exists($res,'error'))
        {
            Log::info(json_encode($res));
            return view('dashboard');
        }
        $rec = new Tk();
        $rec->token_type = true;
        $rec->token = $res->access_token;
        $rec->refresh_token = $res->refresh_token;
        $rec->expire = now()->addSeconds($res->expires_in);
        $rec->code_id = $id;
        $rec->save();
        return view('dashboard');
    }
    public static function code_valid($id)
    {
        $store = ES::where('id',$id)->first();
        $token = DB::table('auth_codes')
        ->leftJoin('tokens','tokens.code_id','auth_codes.id')
        ->where('auth_codes.ebay_store_id','=',$id);
        $token = $token->first();
        if($token->expire < now())
        {
            $res = EH::refreshToken($store,$token->refresh_token);
            if(!property_exists($res,'access_token'))
            {
                Log::info(json_encode($res));
                return;
            }
            DB::table('tokens')
            ->where('id',$token->id)
            ->update([
                'token' => $res->access_token,
                'expire' => now()->addSeconds($res->expires_in)
            ]);
            $token = DB::table('auth_codes')
            ->leftJoin('tokens','tokens.code_id','auth_codes.id')
            ->where('auth_codes.ebay_store_id','=',$id)
            ->first();
        }
        return $token->token;
    }
}
