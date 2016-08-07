<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Iva99030;
use Validator;

class Iva99030Controller extends Controller
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
        $totalMontoActual = Iva99030::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.iva99030.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $iva99030s = Iva99030::orderBy('id', 'DESC')->get();
        return response()->json(
            $iva99030s->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.iva99030.create');
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
            'periodo'   => 'required|unique:iva99030s',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $iva99030 = new Iva99030($request->all());
            $iva99030->save();
            $periodo = date('m-Y', strtotime($iva99030->periodo));

            return response()->json([
                'success'   => true,
                'message'   => 'El gasto de la forma 99030 del periodo <b>' . $periodo . '</b> se creó con exito!'
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
        $iva99030 = Iva99030::find($id);
        return response()->json(
            $iva99030->toArray()
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
        $iva99030 = Iva99030::find($id);
        $iva99030->fill($request->all());
        $iva99030->save();
        $periodo = date('m-Y', strtotime($iva99030->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99030 del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $iva99030 = Iva99030::find($id);
        $iva99030->delete();
        $periodo = date('m-Y', strtotime($iva99030->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99030 del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]);
    }
}
