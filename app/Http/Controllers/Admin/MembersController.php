<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
   
  public function index()
  {
    $members = Member::orderBy('priority')->paginate(5);
    return view('admin.members.index', compact('members'));
  }

  public function create()
  {
    return view('admin.members.create');
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
    
    $path = 'storage/images/members/';
    $imageName = time().'.'.request()->picture->getClientOriginalExtension();
    request()->picture->move(public_path($path), $imageName);
    $member = Member::create([
      'name' => $request->name,
      'position' => $request->position,
      'picture' => $path.$imageName,
      'priority' => $request->priority,
    ]);
    return redirect()->route('members.index')->with('success','Miembro alojado con exito');
  }
  
  public function show($id)
  {
      //
  }

  public function edit($id)
  {
    $member = Member::find($id);
    if ($member) {
      return view('admin.members.edit', compact('member'));
    }else {
      return redirect()->route('members.index')->with('error', 'Miembro no encontrado');;
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
    return redirect()->route('members.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $member = Member::find($id);
      $member->name = $request->name;
      $member->position = $request->position;
      $member->priority = $request->priority;
      if($request->picture){
        $path = 'storage/images/members/';
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path($path), $imageName);
        $member->picture = $path.$imageName;
      }
      if($member->save()){
        return redirect()->route('members.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('members.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('members.index')->with('error', 'Ocurrio un error al editar');
    }
  }
  
  public function destroy($id)
  {
    $member = Member::find($id);
    if ($member) {
      $member->delete();
      return redirect()->route('members.index')->with('success','Miembro eliminado con exito');
    }
    return redirect()->route('members.index')->with('error','Error al eliminar Registro');   
  }

  private function rules() {
    return [
      'name' => 'required',
      'position' => 'required',
      'picture' => 'image|mimes:jpeg,bmp,png,jpg',
      'priority' => 'required|numeric',
    ];
  }

  private function errorMessages() {
    return [
      'name.required' => 'Nombre es un campo requerido',
      'position.required' => 'Cargo es un campo requerido',
      'priority.required' => 'Prioridad es un campo requerido',
      'priority.numeric' => 'Prioridad debe ser un numero',
      'picture.uploaded' => 'Formato de archivo invalido',
    ];
  }
}
