<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function users()
    {
        return view('users');
    }

    static function getAllUsers()
    {
        $Users = new User();
        $users = $Users->getUsers();

        return $users;
    }


}
