<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
class AuthorController extends Controller
{
    public function authordetails(){
        //$count = DB::table('authors')->count();
       // $author = DB::table('books')->count();
        $users = DB::table('books')->select('books.id','authors.author_name','books.book_name','books.created_at')->
        join('authors','books.author_id','=','authors.id' )->orderBy('id')->get();
        return view('admin.authordetails', compact('users'));
    }

    public function addbook(){
        $users = Author::get();
        return view('admin.addbook', compact('users'));
    }
    public function addauthor(){
        return view('admin.addauthor');
    }

    public function authoradd(Request $request){
                 $request->validate([
                'author_name' => 'required',
                'designation' => 'required',
                'city' => 'required',
             ]);

             $user = new Author;
             $user->author_name = $request->author_name;
             $user->designation = $request->designation;
             $user->city = $request->city;
             $user->save();

             return redirect('admin/authordetails')->with('success','Author Add Successfully');
             
    }


    public function authdata(Request $request){
        $users = Author::get();
        
        return view('addauthor', compact('users'));
    }


       public function bookadd(Request $request){
        $request->validate([
            'book_name' =>'required',
            'author_id' => 'required',
        ]);

        $author = new Book;
        $author->Book_name = $request->book_name;
        $author->author_id = $request->author_id;
        $author->save();

        return redirect('admin/authordetails')->with('success','Author Book Add Successfully');
       }

       
       public function delete($id){
        $author = book::find($id);
        $author->delete();
        return redirect('admin/authordetails')->with('success','Delete Successfully');
      }

      public function update(Request $request, $id){
        $author =  Book::find($id);
        $users = DB::table('books')->select('authors.id', 'authors.author_name','books.book_name','books.created_at')->
        join('authors','books.author_id','=','authors.id' )->get();
        return view('admin.update', compact('users', 'author'));
      }

      public function updateauthor(Request $request,$id)
      {
        $request->validate([
            'book_name' => 'required',
        ]);

        $author = Book::find($id);
        $author->Book_name = $request->book_name;
        $author->author_id = $request->author_id;
        $author->save();

        return redirect('admin/authordetails')->with('success',"Book Update Successfully");
      }

    //   public function liveSearch(Request $request){
    //     $search = $request->search;

    //     $post = Author::where(function($query) use ($search){
           
    //      $query->where('author_name','like',"%$search%")
    //      ->orWhere('id','like',"%$search%");

    //     })
    //     ->orWhereHas('books',function($query) use($search){
    //         $query->where('book_name','like',"%$search%");
    //     })->get();

    //     return view('admin/authordetails',compact('post', 'search'));

    //   }


   
}
