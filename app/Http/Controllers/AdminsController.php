<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    function login()
    {
        return view('login');
    }

//    REST API
    function loginVerification()
    {
        $input = \Request::all();

        if ((isset($input['login']) && $input['login'] != '') &&
            (isset($input['password']) && $input['password'] != '')) {
            $Admins = new Admins();
            $admin = $Admins->where('login', '=', $input['login'])
                            ->where('password', '=', $input['password'])
                            ->get();
            if(isset($admin[0]))
            {
                return 'true';
            } else
            {
                return 'false';
            }
        }
    }


}