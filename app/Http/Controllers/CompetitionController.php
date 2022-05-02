<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\user_competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{


    public function index()
    {
        $competitions = competition::all();
        $page_name = 'المسابقات';
        return view('admins.competitions.index',compact('competitions','page_name'));
    }


    public function create()
    {
        $page_name = 'إضافة مسابقة';
        return view('admins.competitions.create',compact('page_name'));
    }




    public function show(Request $r)
    {
        $competition = competition::whereId($r->id)->first();
        $page_name = 'عرض المسابقة';
        return view('admins.competitions.show',compact('competition','page_name'));

    }


    public function edit(Request $r)
    {
        $competition = competition::whereId($r->id)->first();
        $page_name = 'تعديل المسابقة';
        return view('admins.competitions.edit',compact('competition','page_name'));
    }



    public function delete(Request $r)
    {
        competition::destroy($r->id);
        return redirect()->route('admin.competitions');
    }


    public function acceptComp(Request $r) {
        $comp = user_competition::whereId($r->id)->first();
        user_competition::whereId($r->id)->update(['status'=>1]);
        $count = user_competition::whereId($r->id)->where('status','!=',2)->get()->count();
        Competition::whereId($comp->competition_id)->where('total','>',$count)->update(['status'=>0]);
        return redirect()->route('admin.booking.competition.show');
    }


    public function rejectComp(Request $r) {
        $comp = user_competition::whereId($r->id)->first();
        user_competition::whereId($r->id)->update(['status'=>2]);
        $count = user_competition::whereId($r->id)->where('status','!=',2)->get()->count();
        Competition::whereId($comp->competition_id)->where('total','>',$count)->update(['status'=>0]);
        return redirect()->route('admin.booking.competition.show');
    }


}
