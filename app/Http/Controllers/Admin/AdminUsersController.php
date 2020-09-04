<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminUsersController extends Controller
{
    public function login(User $user)
    {
        if ('manage_contents') {
            return view('admin.index', compact('user'));
        } else {
            return "对不起，您权限不足!";
        }
    }
}
