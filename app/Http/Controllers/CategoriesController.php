<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    public function getList()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return response()->json(
            $categories->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if(\Request::ajax())
        //{
            $validator = Validator::make($request->all(), [
                'nombre'    => 'required|unique:categories'
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => $validator->getMessageBag()->toarray()
                ]);
            }else{
                $category = new Category($request->all());
                $category->save();

                if($category)
                {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'La categoría <b>' . $category->nombre . '</b> se creó con exito!',
                        'category'  => $category->toArray()
                    ]);
                }
            }
        //}
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
        $category = Category::find($id);
        return response()->json(
            $category->toArray()
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
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();

        return response()->json([
            'success'   => true,
            'message'   => 'La categoría <b>' . $category->nombre . '</b> se actualizó con exito!'
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
        $category = Category::find($id);
        $category->save();

        return response()->json([
            'success'   => true,
            'message'   => 'La categoría <b>' . $category->nombre . '</b> se eliminó con exito!'
        ]);
    }
}
