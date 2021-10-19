<?php

namespace App\Http\Controllers\Buku;

use App\Buku;
use App\Http\Controllers\Controller;
use App\Http\Requests\Buku\BukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Response;

class BukuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $buku = Buku::all();
    $data = [
      'books' => $buku
    ];
    return view('buku.index', $data);
  }

  public function allBukus()
  {
    $buku = Buku::all();
    $data = [
      'books' => $buku
    ];
    return view('admin.buku.index', $data);
  }

  public function adminCreateBuku()
  {
    return view('admin.buku.create');
  }

  public function adminEditBuku(Buku $buku)
  {
    $data = [
      'buku' => $buku
    ];
    return view('admin.buku.edit', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('admin.buku.create');
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
    $nama_gambar = $request->file('nama_gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('nama_gambar')->extension();
    $validatedData['nama_gambar'] = $nama_gambar;
    $request->file('nama_gambar')->move(public_path('img'), $nama_gambar);
    Buku::create($validatedData);
    return redirect()->route('admin.buku.index')->with('success', 'Buku baru berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function show(Buku $buku)
  {
    $data = [
      'book' => $buku,
    ];
    return view('buku.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function edit(Buku $buku)
  {
    $data = [
      'buku' => $buku
    ];
    return view('admin.buku.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Buku $buku)
  {
    $validatedData = $request->all();
    $buku->update($validatedData);
    return redirect()->route('admin.buku.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Buku  $buku
   * @return \Illuminate\Http\Response
   */
  public function destroy(Buku $buku)
  {
    $buku->delete();
    return redirect()->route('admin.buku.index')->with('success', $buku->judul_buku . ' berhasil dihapus');
  }

  public function searchBooks(Request $request)
  {
    if ($request->ajax()) {
      $output = "";
      $books = DB::table('bukus')->where('judul_buku', 'LIKE', '%' . $request->search . "%")->get();
      if ($books) {
        foreach ($books as $key => $book) {
          $output .= '<tr>' .
            '<td>' . $book->judul_buku . '</td>' .
            '<td>' . $book->penulis . '</td>' .
            '<td>' . $book->tahun_terbit . '</td>' .
            '</tr>';
        }
        return Response($output);
      }
    }
  }
}
