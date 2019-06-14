<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionsController extends Controller
{
   
    public function index()
    {
        $promotions = Promotion::orderBy('priority')->paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    
    public function store(Request $request)
    {
      $validator = Validator::make(
        $request->all(),
        $this->rules(),
        $this->errorMessages()
      );
    
      if ($validator->fails()) {
        return redirect()->route('promotions.create')->withErrors($validator->messages())->withInput();
      }

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
      $promotion = Promotion::find($id);
      if ($promotion) {
        return view('admin.promotions.edit', compact('promotion'));
      }else {
        return redirect()->route('promotions.index')->with('error', 'Item no encontrado');;
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
      return redirect()->route('promotions.edit', $id)->withErrors($validator)->withInput();
      }
  
      try {
        $promotion = Promotion::find($id);
        $promotion->title = $request->title;
        $promotion->priority = $request->priority;
        $promotion->status = $request->status;
        $path = 'storage/images/promotions/';
        if($request->image){
          $imageName = time().'.'.request()->image->getClientOriginalExtension();
          request()->image->move(public_path($path), $imageName);
          $promotion->image = $path.$imageName;
        }
        if($promotion->save()){
          return redirect()->route('promotions.index')->with('success', 'Edición exitosa');
        } else {
          return redirect()->route('promotions.index')->with('error', 'Ocurrio un error al editar');
        }
      } catch (\Exception $e) {
        return redirect()->route('promotions.index')->with('error', 'Ocurrio un error al editar');
      }
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

    private function rules() {
      return [
        'title' => 'required',
        'image' => 'image|mimes:jpeg,bmp,png,jpg',
        'priority' => 'required|numeric',
      ];
    }
  
    private function errorMessages() {
      return [
        'title.required' => 'Titulo es un campo requerido',
        'priority.required' => 'Prioridad es un campo requerido',
        'priority.numeric' => 'Prioridad debe ser un numero',
        'image.image' => 'Formato de archivo invalido',
      ];
    }
}
