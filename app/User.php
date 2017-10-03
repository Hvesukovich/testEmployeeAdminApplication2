<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'DateOfBirth',
        'email',
        'password',
        'address',
        'img',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    function getAllUsers()
    {
        return $this->get()->toArray();
    }

    function getUserById($id)
    {
        return $this->find($id);
    }

    function delUserById($id)
    {
        return $this->find($id)->delete();
    }

    function updateUser($input)
    {
        return $this->find($input['id'])->update([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'DateOfBirth' => $input['dateOfBirth'],
            'email' => $input['email'],
            'password' => $input['password'],
            'address' => $input['address'],
//                'img' => $src_photo
        ]);
    }

    function createNewUser($input)
    {
        return $this->create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'DateOfBirth' => $input['dateOfBirth'],
            'email' => $input['email'],
            'password' => $input['password'],
            'address' => $input['address'],
            'img' => '../../images/holder.jpg'
        ]);
    }

    function maxUserById()
    {
        return $this->max('id');
    }
}
