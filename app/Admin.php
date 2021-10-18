<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  protected $table = 'admins';
  protected $guard = 'admin';
  protected $fillable = [
    'name', 'email', 'password'
  ];
  protected $hidden = [
    'password', 'remember_token'
  ];
  public function peminjamans()
  {
    return $this->hasMany(Peminjaman::class);
  }
}
