<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    public function roles()
    {
        return view('access.role');
    }
    public function rights($id)
    {
        return view('access.rights');
    }
    public function user_manage()
    {
        $users = DB::table('users')
        ->leftJoin('user_role','user_role.user_id','=','users.id')
        ->leftJoin('roles','roles.id','=','user_role.role_id')
        ->get();
        return view('access.user-manage')->with('users',$users);
    }
    public function user_register()
    {
        return view('access.user-register');
    }
}
