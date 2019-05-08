<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    
    public function store(Request $request)
    {
        return redirect()->route('users.index')->with('success','Item alojado con exito');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
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
}
