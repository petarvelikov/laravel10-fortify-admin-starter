<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::get();

        return view('admin.users')->with('users', $users);
    }

    public function viewMyProfile() {
        return view('my-profile');
    }

    public function editMyProfile() {
        
    }
}
