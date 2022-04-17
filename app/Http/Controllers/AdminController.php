<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function showLogin() {
        return view('admins.login');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function profile() {
        return view('admins.profile',['page_name' => 'Profile']);
    }

    public function settings() {
        return view('admins.settings',['page_name' => 'Settings']);
    }

    public function changePassword() {
        return view('admins.changePassword',['page_name' => 'Change Password']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
