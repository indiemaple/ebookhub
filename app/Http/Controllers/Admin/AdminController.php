<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * 后台登录界面
     */
    public function login()
    {
        return view('admin.login');
    }


}
