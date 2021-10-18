<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('peminjamans', function (Blueprint $table) {
      $table->id();
      $table->string('tgl_pinjam')->nullable();
      $table->string('tgl_kembali')->nullable();
      $table->integer('anggota_id')->nullable();
      $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade');
      $table->integer('buku_id')->nullable();
      $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
      $table->integer('admin_id')->nullable();
      $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
      $table->enum('status', ['Waiting', 'Approved', 'Rejected', 'Done'])->default('Waiting');
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
    Schema::dropIfExists('peminjamans');
  }
}
