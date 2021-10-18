<?php

namespace App\Http\Controllers\Anggota;

use App\Anggota;
use App\Buku;
use App\Http\Controllers\Controller;
use App\Http\Requests\Anggota\AnggotaRequest;
use App\Peminjaman;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
  // Admin - Anggota
  public function allAnggotas()
  {
    $anggotas = Anggota::all();
    $data = [
      'anggotas' => $anggotas
    ];
    return view('admin.anggota.index', $data);
  }

  public function adminCreateAnggota()
  {
    return view('admin.anggota.create');
  }

  public function adminEditAnggota(Anggota $anggota)
  {
    $data = [
      'anggota' => $anggota
    ];
    return view('admin.anggota.edit', $data);
  }



  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Anggota $anggota)
  {
    $buku = Buku::all()->collect();
    $anggota = Anggota::all()->collect();
    $peminjam = Peminjaman::all()->collect();
    $data = [
      'books' => $buku,
      'anggota' => $anggota,
      'peminjam' => $peminjam,
    ];
    return view('anggota.index', $data);
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
  public function store(AnggotaRequest $request)
  {
    $validatedData = $request->all();
    $validatedData['password'] = bcrypt('password');
    $angggota = Anggota::create($validatedData);
    return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Anggota  $anggota
   * @return \Illuminate\Http\Response
   */
  public function show(Anggota $anggota)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Anggota  $anggota
   * @return \Illuminate\Http\Response
   */
  public function edit(Anggota $anggota)
  {
    // return $anggota
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Anggota  $anggota
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Anggota $anggotum)
  {
    $validatedData = $request->all();
    $anggota = $anggotum->update($validatedData);
    return redirect()->route('admin.anggota.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Anggota  $anggota
   * @return \Illuminate\Http\Response
   */
  public function destroy(Anggota $anggotum)
  {
    $anggotum->delete();
    return redirect()->route('admin.anggota.index')->with('success', $anggotum->name . ' berhasil dihapus');
  }
}
