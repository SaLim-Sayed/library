<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::select('id', 'title', 'desc', 'img')->get();
        return response()->json($books);
    }
    public function show($id)
    {
        $book = Book::with('categories:id,name')->findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {

        #validation
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'desc' => 'required|string',
            'img' => ['required', 'image', 'mimes:jpg,png'],
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        //move image to public
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/books'), $name);

        $book = Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name,
        ]);
        $book->categories()->sync($request->category_ids);
        $success = "book created successfully";
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        #validation
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'desc' => 'required|string',
            'img' => ['required', 'image', 'mimes:jpg,png'],
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $book = Book::findOrFail($id);
        $name = $book->img;
        if ($request->hasFile('img')) {
            if ($name !== null) {
                unlink(public_path('uploads/books/') . $name);
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book-" . uniqid() . ".$ext";
            $img->move(public_path('uploads/books'), $name);

        }
        $book->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name,
        ]);
        $book->categories()->sync($request->category_ids);
        return response()->json($book);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path('uploads/books/') . $book->img);
        }
        $book->delete();
        $success = "book deleted successfully";
        return response()->json($success);
    }

}
