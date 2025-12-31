<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TokenController extends Controller
{
    public function setToken(Request $request) : View
    {
        if(isset($_GET['code']))
        {
            //insert into db here
            $code = $_GET['code'];
            $expiry = $_GET['expires_in'];
        }
        return view('dashboard')->with('req',$request);
    }
}
