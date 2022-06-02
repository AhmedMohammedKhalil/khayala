<?php

namespace App\Http\Controllers;

use App\Models\booking_trainer;
use App\Models\Trainer;
use App\Models\User;
use App\Models\user_product;
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
        return view('trainers.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('trainers.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('trainers.changePassword',['page_name' => 'تعديل الباسورد']);
    }

    public function logout(Request $request) {
        Auth::guard('trainer')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


    public function showUser(Request $r) {
        $page_name = 'بيانات المستخدم';
        $user = User::whereId($r->id)->first();
        return view('trainers.userDetails',compact('user','page_name'));
    }


    public function showBooking(){
        $bookings = booking_trainer::where('trainer_id',auth('trainer')->user()->id)->get();
        $page_name = 'جدول مواعيد المدرب';
        return view('trainers.bookings.index',compact('bookings','page_name'));
    }

    public function BookingDetails(Request $r){
        $booking = booking_trainer::find($r->id);
        $page_name = 'تفاصيل عن الموعد';
        return view('trainers.bookings.show',compact('booking','page_name'));
    }



    public function showOrders() {
        $page_name = 'الطلبات';
        $products = auth('trainer')->user()->products;
        $ids = [];
        foreach($products as $p)
            array_push($ids,$p->id);
        $orders = user_product::whereIn('product_id',$ids)->get();
        return view('trainers.orders',compact('orders','page_name'));
    }
}
