<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'login',
        'password',
        'created_at',
        'updated_at'
    ];

    function adminsCreate($adminLogin, $adminPassword)
    {
        return $this->create([
            'login' => $adminLogin,
            'password' => $adminPassword,
        ]);
    }

    function userSearch($adminLogin)
    {
        return $this->where('login', '=', $adminLogin)
            ->get()
            ->toArray();
    }

    function loginVerification($login, $password)
    {
        return $this->where('login', '=', $login)
            ->where('password', '=', $password)
            ->get();
    }
}
