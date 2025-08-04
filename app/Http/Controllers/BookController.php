<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function booklist(){
        $books = Book::paginate(6);
        return view('booklist',['books'=>$books]);
    }

    public function detailbook(Book $book){
        return view('detailbook',['book'=>$book]);
    }

    public function bookupdate(Book $book){
        $genre = Genre::all();
        return view('bookupdate',['book'=>$book,'genre'=>$genre]);
    }

    public function create(){
        $genre = Genre::all();
        return view('create',['genre'=>$genre]);
    }

    public function store(Request $request){
        $validated = $request->validate(
            [
                'title'=> 'required | max:30',
                'photo' => 'required | Image | max:5120',
                'author' => 'required | max:30',
                'genre' => 'required',
                'publish_date' => 'required | date | before_or_equal:today',
                'desc' => 'required'
            ]
            );
        $book = new Book();
        $book->title = $request->title;
        $book->photo = $request->photo->store('book','public');
        $book->author = $request->author;
        $book->genre_id = $request-> genre;
        $book->desc = $request->desc;
        $book->publish_date = $request->publish_date;
        $book->save();
        return back() -> with('success','true');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect(route('book.show'))->with('success','true');
    }

    public function detail(Book $book){
        $genre = Genre::all();
        return view('update',['genre'=>$genre]);
    }

    public function update(Request $request,Book $book){
        $validated = $request->validate([
            'title'=> 'required | max:30',
                'photo' => 'Image | max:5120 | nullable',
                'author' => 'required | max:30',
                'genre' => 'required',
                'publish_date' => 'required | date | before_or_equal:today',
                'desc' => 'required'
        ]);
        $book->title = $request->title;
        if($request->photo!=null){
            $book->photo = $request->photo->store('book','public');
        }

        $book->author = $request->author;
        $book->genre_id = $request-> genre;
        $book->desc = $request->desc;
        $book->publish_date = $request->publish_date;
        $book->save();
        return back() -> with('success','true');
    }
}
