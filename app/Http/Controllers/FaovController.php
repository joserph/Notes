<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faov;
use Validator;

class FaovController extends Controller
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
        $totalMontoActual = Faov::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.faovs.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $faovs = Faov::orderBy('id', 'DESC')->get();
        return response()->json(
            $faovs->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faovs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'periodo'   => 'required|unique:faovs',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $faov = new Faov($request->all());
            $faov->save();
            $periodo = date('m-Y', strtotime($faov->periodo));

            return response()->json([
                'success'   => true,
                'message'   => 'El gasto por FAOV del periodo <b>' . $periodo . '</b> se creó con exito!'
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
        $faov = Faov::find($id);
        return response()->json(
            $faov->toArray()
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
        $faov = Faov::find($id);
        $faov->fill($request->all());
        $faov->save();
        $periodo = date('m-Y', strtotime($faov->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por FAOV del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $faov = Faov::find($id);
        $faov->delete();
        $periodo = date('m-Y', strtotime($faov->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'El gasto por FAOV del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]);
    }
}
