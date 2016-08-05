<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sumat;
use Validator;

class SumatController extends Controller
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
        $totalMontoActual = Sumat::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.sumats.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $sumats = Sumat::orderBy('id', 'DESC')->get();
        return response()->json(
            $sumats->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sumats.create');
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
            'periodo'   => 'required|unique:sumats',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $sumat = new Sumat($request->all());
            $sumat->save();
            $periodo = date('m-Y', strtotime($sumat->periodo));

            return response()->json([
                'success'   => true,
                'message'   => 'El gasto por SUMAT del periodo <b>' . $periodo . '</b> se creó con exito!'
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
        $sumat = Sumat::find($id);
        return response()->json(
            $sumat->toArray()
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
        $sumat = Sumat::find($id);
        $sumat->fill($request->all());
        $sumat->save();
        $periodo = date('m-Y', strtotime($sumat->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por SUMAT del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $sumat = Sumat::find($id);
        $sumat->delete();
        $periodo = date('m-Y', strtotime($sumat->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por SUMAT del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]);
    }
}
