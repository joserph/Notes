<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Activity;

class ActivitiesController extends Controller
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
        return view('admin.activities.index');
    }

    public function getList()
    {
        $activities = Activity::with('user')->orderBy('id', 'DESC')->get();
        return response()->json(
            $activities->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Caracas');
        if(\Request::ajax())
        {
            $validator = Validator::make($request->all(), [
                'nombre'    => 'required',
                'contenido' => 'required',
                'tipo'      => 'required'
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => $validator->getMessageBag()->toArray()
                ]);
            }else{
                $activity = new Activity($request->all());
                $activity->save();

                if($activity)
                {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'La actividad <b>' . $activity->nombre . '</b> se creó con exito!',
                        'activity'  => $activity->toArray()
                    ]);
                }
            }
        }
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
        $activity = Activity::find($id);
        return response()->json(
            $activity->toArray()
        );
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
        $activity = Activity::find($id);
        $activity->fill($request->all());
        $activity->save();

        return response()->json([
            'success'   => true,
            'message'   => 'La actividad <b>' . $activity->nombre . '</b> se actualizó con exito!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        
        return response()->json([
            'success'   => true,
            'message'   => 'La actividad <b>' . $activity->nombre . '</b> se eliminó con exito!'
        ]);
    }
}
