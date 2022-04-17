<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TrainerController extends Controller
{




    public function showLogin() {
        return view('trainers.login');
    }


    public function showRegister() {
        return view('trainers.register');
    }


    public function profile() {
        return view('trainers.profile',['page_name' => 'Profile']);
    }

    public function settings() {
        return view('trainers.settings',['page_name' => 'Settings']);
    }

    public function changePassword() {
        return view('trainers.changePassword',['page_name' => 'Change Password']);
    }

    public function logout(Request $request) {
        Auth::guard('trainer')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }



}
