<?php

namespace App\Http\Requests\Buku;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'judul_buku' => 'required|min:4',
      'penulis' => 'required|min:3',
      'tahun_terbit' => 'required|min:4',
      'kode_buku' => 'required|min:3|unique:bukus',
      'stok_buku' => 'required|integer',
      'penerbit' => 'required',
      'nama_gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ];
  }
}
