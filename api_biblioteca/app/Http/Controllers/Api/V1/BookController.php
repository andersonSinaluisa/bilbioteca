<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $validate = request()->validate([
            'category' => 'integer',
            'orden' => 'in:asc,desc',
            'per_page' => 'integer|min:1|max:50',
            'page' => 'integer|min:1'
        ]);
        

        $category = request()->query('category');
        $orden = request()->query('orden');
        $per_page = request()->query('per_page');
        $page = request()->query('page');
        
        if ($category) {
            $books = Book::where('category_id', $category)->get();
        } else if ($orden) {
            $books = Book::orderBy('name', $orden)->get();
        } else {
            $books = Book::all();
        }

        $last_page = ceil($books->count() / $per_page);
        $total = $books->count();

        $books= $books->forPage($page, $per_page);

        
        

        return response()->json([
            'success' => true,
            'message' => 'Libros Encontrados',
            'data' => $books,
            'meta' => [
                'total' => $total,
                'per_page' => $per_page,
                'page' => $page,
                'current_page' => $page,
                'last_page' => $last_page,

                
            ]
        ], 200);
    }


    public function show($id)
    {
        $book = Book::find($id);

        if ($book) {
            return response()->json([
                'success' => true,
                'message' => 'Libros Encontrados',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron libros',
                'data' => null
            ], 404);
        }
    }


    public function store(Request $request)
    {
        
        $validate = request()->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'author' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|string|max:255',
        ]);

            
        $book = new Book();
        $book->fill($request->all());
        $book->save();

        return response()->json([
            'success' => true,
            'message' => 'Libro creado correctamente',
            'data' => $book
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->fill($request->all());
            $book->save();

            return response()->json([
                'success' => true,
                'message' => 'Libro actualizado correctamente',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Libro no encontrado',
                'data' => ''
            ], 404);
        }
    }


    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Libro eliminado correctamente',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Libro no encontrado',
                'data' => ''
            ], 404);
        }
    }


    










    
}
