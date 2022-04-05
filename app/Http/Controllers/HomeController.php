<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Trainer;
use Illuminate\Http\Request;

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
        $competitions = Competition::where('status',0)->get();
        return view('competition',compact('competitions'));
    }


    public function search()
    {
        $doctors = Doctor::all();
        $trainers = Trainer::all();
        $products = Product::all();
        return view('search',compact('trainers','products','doctors'));
    }
}
