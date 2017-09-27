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
}
