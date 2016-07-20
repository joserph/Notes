<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Water;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.water.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.water.create');
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
                'periodo'   => 'required',
                'estatus'   => 'required'
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => $validator->getMessageBag()->toArray()
                ]);
            }else{
                $water = new Water($request->all());
                $water->save();

                if($water)
                {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'El gasto por agua del periodo <b>' . $water->periodo . '</b> se creó con exito!',
                        'water'     => $water->toArray()
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
        $water = Water::find($id);

        return response()->json(
            $water->toArray()
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
        $water = Water::find($id);
        $water->fill($request->all());
        $water->save();

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por agua del periodo <b>' . $water->periodo . '</b> se actualizó con exito!'
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
        $water = Water::find($id);
        $water->delete;

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por agua del periodo <b>' . $water->periodo . '</b> se eliminó con exito!'
        ]);
    }
}
