<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Cases;
use App\Models\Competition;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Trainer;
use App\Models\User;
use App\Models\user_competition;
use App\Models\user_product;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function showLogin() {
        return view('admins.login');
    }

    public function dashboard() {

        $page_name = 'الإحصائيات';
        $u_count = User::all()->count();
        $p_count = Product::all()->count();
        $t_count = Trainer::all()->count();
        $d_count = Doctor::all()->count();
        $comp_count = Competition::all()->count();
        return view('admins.dashboard',compact('page_name','u_count','p_count','t_count','d_count','comp_count'));
    }

    public function profile() {
        return view('admins.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('admins.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('admins.changePassword',['page_name' => 'تغيير كلمة السر']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


    public function showBookingCompetition() {
        $page_name = 'إشتراكات المسابقات';
        $bookings = user_competition::all();
        return view('admins.bookCompetitions',compact('bookings','page_name'));
    }

    public function showUser(Request $r) {
        $page_name = 'بيانات المستخدم';
        $user = User::whereId($r->id)->first();
        return view('admins.userDetails',compact('user','page_name'));
    }


}
