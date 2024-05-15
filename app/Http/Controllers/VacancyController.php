<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\StoreVacancyRequest;
use App\Http\Requests\Vacancy\UpdateVacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::all();

        return view("pages.vacancy.index",compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create';
        return view('pages.vacancy.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancyRequest $request)
    {
        $vacancy = new Vacancy();
        $req = $request->validated();

        $vacancy->title = $req['title'];
        $vacancy->requirements = $req['requirements'];
        $vacancy->start_date = $req['start_date'];
        $vacancy->end_date = $req['end_date'];
        if( isset($req['is_publish'])){
            $vacancy->is_publish = true;
        }
        $vacancy->save();

        return redirect('vacancy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::where('id',$id)->first();
        return view('pages.vacancy.detail',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::where('id',$id)->first();
        $title = 'Update';
        return view('pages.vacancy.form',compact('vacancy','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacancyRequest $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $req = $request->validated();
        $vacancy->title = $req['title'];
        $vacancy->requirements = $req['requirements'];
        $vacancy->start_date = $req['start_date'];
        $vacancy->end_date = $req['end_date'];
        if( isset($req['is_publish'])){
            $vacancy->is_publish = true;
        }        
        $vacancy->save();

        return redirect('vacancy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::where('id',$id)->first();
        if($vacancy != null) {
            $vacancy->delete();
        }
        return redirect('vacancy');
    }
}
