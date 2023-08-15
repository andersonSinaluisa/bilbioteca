<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    

    public function store(){
        $data= request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($data) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validacion de datos',
                'data' => $data
            ], 400);
        }
        $category = Category::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Categoria creada correctamente',
            'data' => $category
        ], 201);
    }


    public function index(){

        $name = request()->query('name');
        $category = Category::where('name', 'like', '%'.$name.'%')->get();

        if (!$name) {
            $category = Category::all();
        }

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Categoria encontrada',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }


    public function show($id){
        $category = Category::find($id);

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Categoria encontrada',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }


    public function update($id){
        $data= request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($data) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validacion de datos',
                'data' => $data
            ], 400);
        }

        $category = Category::find($id);

        if ($category) {
            $category->update($data);
            return response()->json([
                'success' => true,
                'message' => 'Categoria actualizada correctamente',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }

    public function destroy($id){
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Categoria eliminada correctamente',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }
}
