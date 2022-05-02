<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index()
    {
        $cases = Cases::where('doctor_id',auth('doctor')->user()->id)->get();
        $page_name = 'الحالات';
        return view('doctors.cases.index',compact('cases','page_name'));
    }


    public function create()
    {
        $page_name = 'إضافة حالة';
        return view('doctors.cases.create',compact('page_name'));
    }




    public function show(Request $r)
    {
        $case = Cases::whereId($r->id)->first();
        $page_name = 'عرض الحالة';
        return view('doctors.cases.show',compact('case','page_name'));

    }


    public function edit(Request $r)
    {
        $case = Cases::whereId($r->id)->first();
        $page_name = 'تعديل الحالة';
        return view('doctors.cases.edit',compact('case','page_name'));
    }



    public function delete(Request $r)
    {
        Cases::destroy($r->id);
        return redirect()->route('doctor.cases');
    }
}
