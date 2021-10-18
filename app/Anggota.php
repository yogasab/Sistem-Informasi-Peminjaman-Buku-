<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Anggota extends Authenticatable
{
  protected $table = 'anggotas';
  protected $guard = 'anggota';
  protected $guarded = ['id'];
  // protected $fillable = [
  //   'name', 'email', 'password'
  // ];
  // protected $hidden = [
  //   'password', 'remember_token'
  // ];
  public function peminjamans()
  {
    return $this->hasMany(Peminjaman::class);
  }
}
