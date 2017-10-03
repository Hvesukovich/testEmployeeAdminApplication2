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
            $admin = $Admins->loginVerification($input['login'], $input['password']);
            if(isset($admin[0]))
            {
                session_start();
                if (!isset($_SESSION['login'])) {
                    $_SESSION['login'] = true;
                }
                return 'true';
            } else
            {
                return 'false';
            }
        }
    }

    function adminsCreate($adminLogin, $adminPassword)
    {
        $Admins = new Admins();
        $admin = $Admins->userSearch($adminLogin);
        if (!isset($admin[0]['id'])){
            $newAdmin = $Admins->adminsCreate($adminLogin, $adminPassword);

            if (isset($newAdmin))
            {
                return $newAdmin;
            }
        }
        else
        {
            return false;
        }
    }

}