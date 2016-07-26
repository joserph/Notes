<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\SocialSecurity;

class SocialSecurityController extends Controller
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
        $totalMontoActual = SocialSecurity::where('periodo', '>=', $periodo)->sum('monto');
        //dd($totalMontoActual);
        return view('admin.securities.index')
            ->with('anioActual', $anioActual)
            ->with('totalMontoActual', $totalMontoActual);
    }

    public function getList()
    {
        $enero = '01';
        $anioActual = date('Y');
        $periodo = $anioActual.'-'.$enero;
        $securities = SocialSecurity::with('user')->where('periodo', '>=', $periodo)->orderBy('id', 'DESC')->get();
        
        return response()->json(
            $securities->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.securities.create');
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
            'periodo'   => 'required|unique:social_securities',
            'estatus'   => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $security = new SocialSecurity($request->all());
            $security->save();
            $periodo = date('m-Y', strtotime($security->periodo));

            return response()->json([
                'success'   => true,
                'message'   => 'EL gasto de seguro social del periodo <b>' . $periodo . '</b> se creó con exito!',
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
        $security = SocialSecurity::find($id);
        return response()->json(
            $security->toArray()
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
        $security = SocialSecurity::find($id);
        $security->fill($request->all());
        $security->save();
        $periodo = date('m-Y', strtotime($security->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'EL gasto de seguro social del periodo <b>' . $periodo . '</b> se actualizó con exito!'
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
        $security = SocialSecurity::find($id);
        $security->delete();
        $periodo = date('m-Y', strtotime($security->periodo));

        return response()->json([
            'success'   => true,
            'message'   => 'EL gasto de seguro social del periodo <b>' . $periodo . '</b> se eliminó con exito!'
        ]);
    }
}
