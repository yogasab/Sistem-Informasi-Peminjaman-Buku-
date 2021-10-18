<?php

namespace App\Http\Requests\Anggota;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
      'email' => 'required|unique:anggotas',
      'name' => 'required',
      // 'password' => 'required',
      'jenis_kelamin' => 'required',
      'no_telp' => 'required',
      'alamat' => 'required',
    ];
  }
}
