<?php

namespace App\Http\Controllers\Peminjaman;

use App\Anggota;
use App\Buku;
use App\Http\Controllers\Controller;
use App\Http\Requests\Peminjaman\PeminjamanRequest;
use App\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Bool_;

use function GuzzleHttp\Promise\all;

class PeminjamanController extends Controller
{
  // Admin - Peminjaman Buku
  public function allPeminjamans()
  {
    $anggota = Peminjaman::with(['anggota', 'buku'])->get()->collect();
    $data = [
      'anggotas' => $anggota
    ];
    return view('admin.peminjaman.index', $data);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $anggota = Peminjaman::with(['anggota', 'buku'])->where('anggota_id', '=', Auth::guard('anggota')->user()->id)->get()->collect();
    $data = [
      'anggotas' => $anggota
    ];
    return view('peminjaman.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Buku $buku)
  {
    return $buku;
    // return $book;
    // return view('peminjaman.create');
  }

  public function tambahPeminjaman()
  {
    return "OK";
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PeminjamanRequest $request)
  {
    $validatedData = $request->all();
    $validatedData['tgl_pinjam'] = Carbon::now();
    $validatedData['tgl_kembali'] = $request->tgl_kembali;
    $peminjaman = Peminjaman::create($validatedData);
    return redirect()->route('peminjaman.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Peminjaman  $peminjaman
   * @return \Illuminate\Http\Response
   */
  public function show(Peminjaman $peminjaman)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Peminjaman  $peminjaman
   * @return \Illuminate\Http\Response
   */
  public function edit(Peminjaman $peminjaman)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Peminjaman  $peminjaman
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Peminjaman $peminjaman)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Peminjaman  $peminjaman
   * @return \Illuminate\Http\Response
   */
  public function destroy(Peminjaman $peminjaman)
  {
    //
  }

  public function peminjamanApprove(Peminjaman $anggota)
  {
    $peminjamans = Peminjaman::with('buku')->where('id', $anggota->id)->get();
    foreach ($peminjamans as $peminjaman) {
      $dataPeminjaman = $peminjaman;
    }
    $dataBuku = $dataPeminjaman->buku;
    $dataPeminjaman['status'] = 'Approved';
    $dataBuku['stok_buku'] = $dataBuku->stok_buku - 1;
    $dataPeminjaman->update();
    $dataBuku->update();
    return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman buku telah disetujui');
  }

  public function peminjamanReject(Peminjaman $anggota)
  {
    $peminjamans = Peminjaman::with('buku')->where('id', $anggota->id)->get();
    foreach ($peminjamans as $peminjaman) {
      $dataPeminjaman = $peminjaman;
    }
    $dataPeminjaman['status'] = 'Rejected';
    $peminjaman->update();
    return redirect()->route('admin.peminjaman.index')->with('error', 'Peminjaman buku tidak disetujui');
  }

  public function peminjamanDone(Peminjaman $anggota)
  {
    $peminjamans = Peminjaman::with('buku')->where('id', $anggota->id)->get();
    foreach ($peminjamans as $peminjaman) {
      $dataPeminjaman = $peminjaman;
    }
    $dataBuku = $peminjaman->buku;
    $dataPeminjaman['status'] = 'Done';
    $dataBuku['stok_buku'] = $dataBuku->stok_buku + 1;
    $dataPeminjaman->update();
    $dataBuku->update();
    return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman buku telah selesai');
  }
}
