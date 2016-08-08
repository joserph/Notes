<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Islr99228;
use Validator;

class Islr99228Controller extends Controller
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
        $totalMontoActual = Islr99228::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.islr99228.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $islr99228s = Islr99228::orderBy('id', 'DESC')->get();
        return response()->json(
            $islr99228s->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.islr99228.create');
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
        $validator = Validator::make($request->all(), [
            'periodo'   => 'required|unique:islr99228s',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $islr99228 = new Islr99228($request->all());
            $islr99228->save();
            $periodo = date('m-Y', strtotime($islr99228->periodo));

            return response()->json([
                'success'   => true,
                'message'   => 'El gasto de la forma 99228 del periodo <b>' . $periodo . '</b> se creó con exito!'
            ]);
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
        $islr99228 = Islr99228::find($id);
        return response()->json(
            $islr99228->toArray()
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
        $islr99228 = Islr99228::find($id);
        $islr99228->fill($request->all());
        $islr99228->save();
        $periodo = date('m-Y', strtotime($islr99228->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99228 del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $islr99228 = Islr99228::find($id);
        $islr99228->delete();
        $periodo = date('m-Y', strtotime($islr99228->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99228 del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]); 
    }
}
