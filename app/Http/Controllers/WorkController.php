<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    public function index()
    {
        $works = Work::where('trainer_id',auth('trainer')->user()->id)->get();
        $page_name = 'الأعمال';
        return view('trainers.works.index',compact('works','page_name'));
    }


    public function create()
    {
        $page_name = 'إضافة عمل';
        return view('trainers.works.create',compact('page_name'));
    }




    public function show(Request $r)
    {
        $work = Work::whereId($r->id)->first();
        $page_name = 'عرض العمل';
        return view('trainers.works.show',compact('work','page_name'));

    }


    public function edit(Request $r)
    {
        $work = Work::whereId($r->id)->first();
        $page_name = 'تعديل العمل';
        return view('trainers.works.edit',compact('work','page_name'));
    }



    public function delete(Request $r)
    {
        Work::destroy($r->id);
        return redirect()->route('trainer.works');
    }
}
