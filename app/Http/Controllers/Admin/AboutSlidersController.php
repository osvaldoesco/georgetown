<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\AboutSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutSlidersController extends Controller
{
   
  public function index()
  {
      $about_sliders = AboutSlider::orderBy('created_at', 'DESC')->paginate(10);
      // ->orderBy('bar', 'desc')
      return view('admin.about_sliders.index', compact('about_sliders'));
  }

  public function create()
  {
      return view('admin.about_sliders.create');
  }

  
  public function store(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );
  
    if ($validator->fails()) {
      return redirect()->route('about_sliders.create')->withErrors($validator->messages())->withInput();
    }

    $path = 'storage/images/about_sliders/';
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path($path), $imageName);
    $about_slider = AboutSlider::create([
      'title' => $request->title,
      'status' => $request->has('status') ? $request->status : '0',
      'priority' => $request->priority,
      'image' => $path.$imageName,
    ]);
    
    return redirect()->route('about_sliders.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
      //
  }

  
  public function edit($id)
  {
    $about_slider = AboutSlider::find($id);
    if ($about_slider) {
      return view('admin.about_sliders.edit', compact('about_slider'));
    }else {
      return redirect()->route('about_sliders.index')->with('error', 'Item no encontrado');;
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
    return redirect()->route('about_sliders.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $about_slider = AboutSlider::find($id);
      $about_slider->title = $request->title;
      $about_slider->priority = $request->priority;
      $about_slider->status = $request->status;
      $path = 'storage/images/about_sliders/';
      if($request->image){
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        $about_slider->image = $path.$imageName;
      }
      if($about_slider->save()){
        return redirect()->route('about_sliders.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('about_sliders.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('about_sliders.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
    $about_slider = AboutSlider::find($id);
    if ($about_slider) {
      $about_slider->delete();
      return redirect()->route('about_sliders.index')->with('success','Item eliminado con exito');
    }
    return redirect()->route('about_sliders.index')->with('error','Error al eliminar Registro');   
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
