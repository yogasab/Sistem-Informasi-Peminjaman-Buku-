<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Anggota;
use App\Buku;
use App\Http\Controllers\Controller;
use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $buku = Buku::all()->collect();
    // Stok buku
    $stok_buku = 0;
    foreach ($buku as $b) {
      $stok_buku += $b['stok_buku'];
    }

    $anggota = Anggota::all()->collect();
    $peminjaman = Peminjaman::with(['buku', 'anggota', 'admin'])->get()->collect();
    $data = [
      'buku' => $buku,
      'peminjaman' => $peminjaman,
      'anggota' => $anggota,
      'stok_buku' => $stok_buku
    ];
    return view('admin.index', $data);
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function show(Admin $admin)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function edit(Admin $admin)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Admin $admin)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function destroy(Admin $admin)
  {
    //
  }
}
