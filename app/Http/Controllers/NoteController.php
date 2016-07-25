<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Note;

class NoteController extends Controller
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
        return view('admin.notes.index');
    }

    public function getList()
    {
        $notes = Note::with('user')->orderBy('id', 'DESC')->get();
        //dd($notes);
        return response()->json(
            $notes->toArray()
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notes.create');
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
            'nombre'    => 'required|unique:notes',
            'contenido' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->getMessageBag()->toArray()
            ]);
        }else{
            $note = new Note($request->all());
            $note->save();

            if($note)
            {
                return response()->json([
                    'success'   => true,
                    'message'   => 'La nota <b>' . $note->nombre . '</b> se creó con exito!',
                    'note'      => $note->toArray()
                ]);
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
        $note = Note::find($id);
        return response()->json(
            $note->toArray()
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
        $note = Note::find($id);
        $note->fill($request->all());
        $note->save();

        return response()->json([
            'success'   => true,
            'message'   => 'La nota <b>' . $note->nombre . '</b> se actualizó con exito!'
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
        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'success'   => true,
            'message'   => 'La nota <b>' . $note->nombre . '</b> se eliminó con exito!'
        ]);
    }
}
