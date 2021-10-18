<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Anggota;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
    $this->middleware('guest:admin');
    $this->middleware('guest:anggota');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  protected function createAdmin(Request $request)
  {
    $this->validator($request->all())->validate();
    $admin = Admin::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => bcrypt($request['password'])
    ]);
    return redirect()->route('admin.index');
  }

  protected function createAnggota(Request $request)
  {
    $this->validator($request->all())->validate();
    $anggota = Anggota::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => bcrypt($request['password'])
    ]);
    return redirect()->route('anggota.index');
  }

  public function showAdminRegisterController()
  {
    return view('auth.register', ['url' => 'admin']);
  }

  public function showAnggotaRegisterController()
  {
    return view('auth.register', ['url' => 'anggota']);
  }
}
