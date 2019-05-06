<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
   
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    
    public function store(Request $request)
    {
        $path = 'storage/images/members/';
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path($path), $imageName);
        $member = Member::create([
            'name' => $request->name,
            'position' => $request->position,
            'picture' => $path.$imageName
        ]);
        return redirect()->route('members.index')->with('success','Miembro alojado con exito');
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
        $member = Member::find($id);
        if ($member) {
          $member->delete();
          return redirect()->route('members.index')->with('success','Miembro eliminado con exito');
        }
        return redirect()->route('members.index')->with('error','Error al eliminar Registro');   
    }
}
