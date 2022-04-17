<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function showLogin() {
        return view('users.login');
    }


    public function showRegister() {
        return view('users.register');
    }


    public function profile() {
        return view('users.profile',['page_name' => 'Profile']);
    }

    public function settings() {
        return view('users.settings',['page_name' => 'Settings']);
    }

    public function changePassword() {
        return view('users.changePassword',['page_name' => 'Change Password']);
    }

    public function logout(Request $request) {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

}
