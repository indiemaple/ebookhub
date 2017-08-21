<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Setting;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'address', ''];

}
