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
use App\Iva99035;
use App\Iva99030;

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
        $countIva99035 = Iva99035::count();
        $countIva99030 = Iva99030::count();
        //dd($countNotes);
        return view('admin.index')
            ->with('countNotes', $countNotes)
            ->with('countActivities', $countActivities)
            ->with('countWaters', $countWaters)
            ->with('countLights', $countLights)
            ->with('countPhones', $countPhones)
            ->with('countSocialSecurities', $countSocialSecurities)
            ->with('countFaovs', $countFaovs)
            ->with('countSumats', $countSumats)
            ->with('countIva99035', $countIva99035)
            ->with('countIva99030', $countIva99030);
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
