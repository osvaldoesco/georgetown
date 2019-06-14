<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
   
  public function index()
  {
    $users = User::orderBy('created_at', 'DESC')->paginate(10);
    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
    return view('admin.users.create');
  }

  public function store(Request $request)
  {

    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );

    if ($validator->fails()) {
      return redirect()->route('members.create')->withErrors($validator->messages())->withInput();
    }
    $pass = 'gt_'.$this->generateRandomString();
    $member = User::create([
      'name' => $request->name,
      'lastname' => $request->lastname,
      'email' => $request->email,
      'no_encript_pass' => $pass,
      'password' => bcrypt($pass),
      'is_admin' => $request->has('is_admin') ? $request->is_admin : '0',
    ]);
    return redirect()->route('users.index')->with('success','Item alojado con exito la contraseña temporal del usuario es: '.$pass);
  }

  
  public function show($id)
  {
    
  }

  
  public function edit($id)
  {
    $user = User::find($id);
    if ($user) {
      return view('admin.users.edit', compact('user'));
    }else {
      return redirect()->route('users.index')->with('error', 'Usuario no encontrado');;
    } 
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );
  
    if ($validator->fails()) {
    return redirect()->route('users.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $user = User::find($id);
      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->email = $request->email;
      $user->is_admin = $request->has('is_admin') ? $request->is_admin : '0';
     
      if($user->save()){
        return redirect()->route('users.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('userns.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('users.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
    $promotion = User::find($id);
    if ($promotion) {
      $promotion->delete();
      return redirect()->route('users.index')->with('success','Item eliminado con exito');
    }
    return redirect()->route('users.index')->with('error','Error al eliminar Registro');   
  }


  //Functionallity
  function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  private function rules() {
    return [
      'name' => 'required',
      'lastname' => 'required',
      'email' => 'required',
    ];
  }

  private function errorMessages() {
    return [
      'name.required' => 'Nombre es un campo requerido',
      'lastname.required' => 'Apellido es un campo requerido',
      'email.required' => 'Email es un campo requerido',
    ];
  }
}
