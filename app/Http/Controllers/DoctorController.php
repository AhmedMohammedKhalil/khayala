<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\User;
use App\Models\user_doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{


    public function showLogin() {
        return view('doctors.login');
    }


    public function showRegister() {
        return view('doctors.register');
    }


    public function profile() {
        return view('doctors.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('doctors.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('doctors.changePassword',['page_name' => 'تعديل الباسورد']);
    }

    public function logout(Request $request) {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

    public function showUser(Request $r) {
        $page_name = 'بيانات المستخدم';
        $user = User::whereId($r->id)->first();
        return view('doctors.userDetails',compact('user','page_name'));
    }


    public function showBooking() {
        $page_name = 'حجز المواعيد';
        $bookings = user_doctor::where('doctor_id',auth('doctor')->user()->id)->get();
        return view('doctors.bookDoctors',compact('bookings','page_name'));
    }


    public function acceptBooking(Request $r) {
        $page_name = 'إضافة ميعاد';
        $booking  = user_doctor::whereId($r->id)->first();
        return view('doctors.acceptBookDoctor',compact('booking','page_name'));
    }

    public function rejectBooking(Request $r) {
        $page_name = 'حجز المواعيد';
        $booking  = user_doctor::whereId($r->id)->first();
        $booking->status = '2';
        $booking->save();
        $bookings = user_doctor::where('doctor_id',auth('doctor')->user()->id)->get();
        return view('doctors.bookDoctors',compact('bookings','page_name'));
    }

}
