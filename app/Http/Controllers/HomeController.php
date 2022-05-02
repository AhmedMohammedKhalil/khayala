<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = Doctor::all();
        $trainers = Trainer::all();
        $products = Product::all();
        return view('home',compact('trainers','products','doctors'));
    }

    public function competition()
    {
        $competitions = Competition::where('status',0)
                        ->where('appointment', '>=', Carbon::now())
                        ->get();
        return view('competition',compact('competitions'));
    }


    public function showCompetition(Request $r)
    {
        $competition = competition::whereId($r->id)->first();
        $page_name = 'عرض المسابقة';
        $now = Carbon::today();
        return view('competiton-details',compact('competition','page_name','now'));

    }

    public function showDoctor(Request $r)
    {
        $doctor = Doctor::whereId($r->id)->first();
        $page_name = 'الدكتور';
        return view('doctor-details',compact('doctor','page_name'));

    }


    public function showTrainer(Request $r)
    {
        $trainer = Trainer::whereId($r->id)->first();
        $page_name = 'المدرب';
        return view('trainer-details',compact('trainer','page_name'));

    }


    public function showProduct(Request $r)
    {
        $product = Product::whereId($r->id)->first();
        $page_name = 'المنتج';
        return view('product-details',compact('product','page_name'));

    }


    public function search()
    {
        $doctors = Doctor::all();
        $trainers = Trainer::all();
        $products = Product::all();
        return view('search',compact('trainers','products','doctors'));
    }



}
