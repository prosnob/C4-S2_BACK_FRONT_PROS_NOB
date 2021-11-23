<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBooks()
    {
        return books::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBook(Request $request)
    {
        $book = new books();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        return response()->json(["message"=>"Book created succesfully!","book"=>$book],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBook($id)
    {
        return books::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request, $id)
    {
        $book = books::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        return response()->json(["message"=>"Book updated succesfully!","book"=>$book],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBook($id)
    {
        $isDeleted = books::destroy($id);
        if ($isDeleted){
            return response()->json(["message"=>"Book deleted succesfully!"],200);

        }else{
            return response()->json(["message"=>"Deleted Fail!"],404);

        }
    }
}
