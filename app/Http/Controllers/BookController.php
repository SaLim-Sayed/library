<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(3);
        // $books=Book::select('title','desc')->get();
        // $books=Book::where('id','>=',2)->get();
        // $books=Book::select('title','desc')->where('id','>=',2)->get();
        // $books=Book::select('title','desc')->where('id','>=',2)->orderBy('id','DESC')->get();
        // dd($books);
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'desc'=>$request->desc
        ]);
        return redirect(route('books.index'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request,$id)
    {
        Book::findOrFail($id)->update([
            'title' => $request->title,
            'desc'=>$request->desc
        ]);
        // Book::create($request->all());
        return redirect(route('books.show',$id));
    }

    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return back();
    }
}
