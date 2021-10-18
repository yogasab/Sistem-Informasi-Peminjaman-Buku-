<?php

namespace App\Http\Controllers\API;

use App\Buku;
use App\Http\Controllers\Controller;
use App\Http\Requests\Buku\BukuRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $books = Buku::all()->collect();
    return response()->json([
      'success' => true,
      'data' => $books,
      'message' => 'Books fetched successfully'
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(BukuRequest $request)
  {
    $validatedData = $request->all();
    $book = Buku::create($validatedData);
    return response()->json([
      'success' => true,
      'data' => $book,
      'message' => 'New Book created successfully'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function show(Buku $book)
  {
    return response()->json([
      'success' => true,
      'data' => $book,
      'message' => 'Book fetched successfully'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function edit(Buku $buku)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Buku $book)
  {
    $validatedData = $request->all();
    $book->update($validatedData);
    return response()->json([
      'success' => true,
      'data' => $book,
      'message' => 'Book updated successfully'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function destroy(Buku $book)
  {
    $book->delete();
    return response()->json([
      'success' => true,
      'data' => $book,
      'message' => $book->judul_buku . ' deleted successfully'
    ]);
  }
}
