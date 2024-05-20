<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    
    public function index() {
        $vacancies = Vacancy::
        whereBetween(DB::raw('now()'),[DB::raw('start_date'),DB::raw('end_date')])
        ->where('is_publish',true)  ->get();
        return view('pages.landingPage',compact('vacancies'));
    }

    public function show($id){
        $vacancy = Vacancy::where('id',$id)->first();
        return view('pages.vacancy.recruitment',compact('vacancy'));
    }
}
