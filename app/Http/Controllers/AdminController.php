<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Note;
use App\Activity;
use App\Water;
use App\Light;
use App\Phone;
use App\SocialSecurity;
use App\Faov;
use App\Sumat;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('editor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countNotes = Note::count();
        $countActivities = Activity::count();
        $countWaters = Water::count();
        $countLights = Light::count();
        $countPhones = Phone::count();
        $countSocialSecurities = SocialSecurity::count();
        $countFaovs = Faov::count();
        $countSumats = Sumat::count();
        //dd($countNotes);
        return view('admin.index')
            ->with('countNotes', $countNotes)
            ->with('countActivities', $countActivities)
            ->with('countWaters', $countWaters)
            ->with('countLights', $countLights)
            ->with('countPhones', $countPhones)
            ->with('countSocialSecurities', $countSocialSecurities)
            ->with('countFaovs', $countFaovs)
            ->with('countSumats', $countSumats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
