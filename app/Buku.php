<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
  protected $table = 'bukus';
  protected $guarded = ['id'];
  public function peminjamans()
  {
    return $this->hasMany(Peminjaman::class);
  }
}
