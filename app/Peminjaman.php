<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
  protected $table = 'peminjamans';
  protected $guarded = ['id'];

  public function anggota()
  {
    return $this->belongsTo(Anggota::class);
  }

  public function buku()
  {
    return $this->belongsTo(Buku::class);
  }

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
