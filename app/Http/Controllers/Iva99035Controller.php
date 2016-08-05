<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Iva99035;
use Validator;

class Iva99035Controller extends Controller
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
        $totalMontoActual = Iva99035::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.iva99035.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $iva99035s = Iva99035::orderBy('id', 'DESC')->get();
        return response()->json(
            $iva99035s->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.iva99035.index');
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
            'periodo'   => 'required|unique:iva99035s',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $iva99035 = new Iva99035($request->all());
            $iva99035->save();

            return response()->json([
                'success'   => true,
                'message'   => 'El gasto de la forma 99035 del periodo <b>' . $iva99035->periodo . '</b> se creó con exito!'
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
        $iva99035 = Iva99035::find($id);
        return response()->json(
            $iva99035->toArray()
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
        $iva99035 = Iva99035::find($id);
        $iva99035->fill($request->all());
        $iva99035->save();

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99035 del periodo <b>' . $iva99035->periodo . '</b> se actualizó con exito!'
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
        $iva99035 = Iva99035::find($id);
        $iva99035->delete();
        
        return response()->json([
            'success'   => true,
            'message'   => 'El gasto de la forma 99035 del periodo <b>' . $iva99035->periodo . '</b> se eliminó con exito!'
        ]);
    }
}
