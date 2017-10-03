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
        $users = $Users->getAllUsers();

        return $users;
    }

    function userDetails($id) {
        if ($id) {
            $Users = new User();
            $user = $Users->getUserById($id);

            return view('user-details', ['user'=>$user]);
        }
    }

    function delUser($id) {
        if ($id) {
            $Users = new User();
            $deleteResult = $Users->delUserById($id);

            return (string)$deleteResult;
        }
    }

    function saveUser() {
        $input = \Request::all();
        $Users = new User();
        if($input['id'] != 0) {
            $user = $Users->updateUser($input);
            if ($user)
            {
                return 'update';
            }
            else {
                return 'false';
            }

        } else if ($input['id'] == 0) {
            $user = $Users->createNewUser($input);
            if ($user['id'])
            {
                $user = $Users->maxUserById();
                return (string)$user;
            } else {
                return 'false';
            }
        }
    }


}
