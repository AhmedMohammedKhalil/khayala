<?php

namespace App\Http\Controllers;

use App\Models\booking_doctor;
use App\Models\booking_trainer;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_competition;
use App\Models\user_product;
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
        return view('users.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('users.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('users.changePassword',['page_name' => 'تعديل الباسورد']);
    }

    public function logout(Request $request) {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


    public function bookCompetition(Request $r) {
        $user = User::find(Auth::guard('user')->user()->id);
        $book_competition = user_competition::where('competition_id',$r->id)
                            ->where('user_id',$user->id)
                            ->first();

        if($book_competition && $book_competition->status != 1){
            $book_competition->delete();
            $user->competition_booking()->attach($r->id);
        }
        $count = user_competition::where('competition_id',$r->id)->where('status','!=',2)->get()->count();
        Competition::whereId($r->id)->where('total','<=',$count)->update(['status'=>1]);
        return redirect()->route('user.booking.competition.show');
    }




    public function buyProduct(Request $r) {
        $user = User::find(Auth::guard('user')->user()->id);
        $user->orders()->attach($r->id);
        return redirect()->route('user.buy.products');
    }


    public function showBuyingProducts() {
        $page_name = 'المشتريات';
        $orders = user_product::where('user_id',auth('user')->user()->id)->get();
        return view('users.buyProducts',compact('orders','page_name'));
    }

    public function showBookingCompetition() {
        $page_name = 'إشتراكات المسابقات';
        $bookings = user_competition::where('user_id',auth('user')->user()->id)->get();
        return view('users.bookCompetitions',compact('bookings','page_name'));
    }


    public function addDoctorBooking(Request $r) {
        $doctor_id = $r->id;
        $page_name = 'إضافة ميعاد';
        return view('users.doctor-booking-add',compact('page_name','doctor_id'));
    }


    public function addTrainerBooking(Request $r) {
        $trainer_id = $r->id;
        $page_name = 'إضافة ميعاد';
        return view('users.trainer-booking-add',compact('page_name','trainer_id'));

    }

    public function delDoctorBooking(Request $r) {
        booking_doctor::destroy($r->id);
        return redirect()->route('user.booking.doctor');
    }


    public function delTrainerBooking(Request $r) {
        booking_trainer::destroy($r->id);
        return redirect()->route('user.booking.trainer');

    }


    public function showbookDoctor() {
        $bookings = booking_doctor::where('user_id',auth('user')->user()->id)->get();
        $page_name = 'جدول مواعيدى مع الدكاترة';
        return view('users.doctor-booking-index',compact('bookings','page_name'));
    }


    public function showbookTrainer() {
        $bookings = booking_trainer::where('user_id',auth('user')->user()->id)->get();
        $page_name = 'جدول مواعيدى مع المدربين';
        return view('users.trainer-booking-index',compact('bookings','page_name'));
    }


    public function trainerBookingDetails(Request $r){
        $booking = booking_trainer::find($r->id);
        $page_name = 'تفاصيل عن الموعد';
        return view('users.trainer-booking-show',compact('booking','page_name'));
    }


    public function doctorBookingDetails(Request $r){
        $booking = booking_doctor::find($r->id);
        $page_name = 'تفاصيل عن الموعد';
        return view('users.doctor-booking-show',compact('booking','page_name'));
    }


}
