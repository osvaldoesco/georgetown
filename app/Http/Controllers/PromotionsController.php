<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
   
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    
    public function store(Request $request)
    {
        $path = 'storage/images/promotions/';
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        
        $promotion = Promotion::create([
            'title' => $request->title,
            'status' => $request->has('status') ? $request->status : '0',
            'priority' => $request->priority,
            'image' => $path.$imageName,
        ]);
        
        return redirect()->route('promotions.index')->with('success','Item alojado con exito');
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
        $promotion = Promotion::find($id);
        if ($promotion) {
          $promotion->delete();
          return redirect()->route('promotions.index')->with('success','Item eliminado con exito');
        }
        return redirect()->route('promotions.index')->with('error','Error al eliminar Registro');   
    }
}
