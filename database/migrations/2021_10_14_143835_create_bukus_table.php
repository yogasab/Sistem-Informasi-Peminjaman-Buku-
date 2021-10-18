<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('bukus', function (Blueprint $table) {
      $table->id();
      $table->string('kode_buku');
      $table->string('judul_buku');
      $table->string('tahun_terbit');
      $table->string('penulis');
      $table->string('penerbit');
      $table->string('nama_gambar')->nullable();
      // $table->string('path');
      $table->text('sinopsis')->nullable();
      $table->integer('stok_buku');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('bukus');
  }
}
