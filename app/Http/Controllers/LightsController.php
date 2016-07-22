<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Light;

class LightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enero = '01';
        $anioActual = date('Y');
        $periodo = $anioActual.'-'.$enero;
        //$waters = Water::with('user')->where('periodo', '>=', $periodo)->orderBy('id', 'DESC')->get();
        $totalMontoActual = Light::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.lights.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $lights = Light::orderBy('id', 'DESC')->get();

        return response()->json(
            $lights->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Request::ajax())
        {
            $validator = Validator::make($request->all(), [
                'periodo'   => 'required|unique:lights',
                'estatus'   => 'required'
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => $validator->getMessageBag()->toArray()
                ]);
            }else{
                $light = new Light($request->all());
                $light->save();
                $periodo = date('m-Y', strtotime($light->periodo));

                if($light)
                {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'El gasto por agua del periodo <b>' . $periodo . '</b> se creó con exito!',
                        'light'     => $light->toArray()
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
        $light = Light::find($id);
        return response()->json(
            $light->toArray()
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
        $light = Light::find($id);
        $light->fill($request->all());
        $light->save();
        $periodo = date('m-Y', strtotime($light->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por agua del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $light = Light::find($id);
        $light->delete();
        $periodo = date('m-Y', strtotime($light->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por agua del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]);
    }
}
