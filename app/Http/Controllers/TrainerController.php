<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Models\User;
use App\Models\user_product;
use App\Models\user_trainer;
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


    public function showBooking() {
        $page_name = 'حجز المواعيد';
        $bookings = user_trainer::where('trainer_id',auth('trainer')->user()->id)->get();
        return view('trainers.bookTrainers',compact('bookings','page_name'));
    }


    public function acceptBooking(Request $r) {
        $page_name = 'إضافة ميعاد';
        $booking  = user_trainer::whereId($r->id)->first();
        return view('trainers.acceptBookTrainer',compact('booking','page_name'));
    }

    public function rejectBooking(Request $r) {
        $page_name = 'حجز المواعيد';
        $booking  = user_trainer::whereId($r->id)->first();
        $booking->status = '2';
        $booking->save();
        $bookings = user_trainer::where('trainer_id',auth('trainer')->user()->id)->get();
        return view('trainers.bookTrainers',compact('bookings','page_name'));
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
