<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\PrincipalSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrincipalSlidersController extends Controller
{
   
  public function index()
  {
      $sliders = PrincipalSlider::orderBy('priority')->paginate(10);
      return view('admin.principal_slider.index', compact('sliders'));
  }

  public function create()
  {
      return view('admin.principal_slider.create');
  }

  
  public function store(Request $request)
  {

    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );
  
    if ($validator->fails()) {
      return redirect()->route('principal_slider.create')->withErrors($validator->messages())->withInput();
    }

    $path = 'storage/images/principal_slider/';
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    $imageNameMobile = time().'mobile.'.request()->image_mobile->getClientOriginalExtension();
    request()->image->move(public_path($path), $imageName);
    request()->image_mobile->move(public_path($path), $imageNameMobile);
    $principal_slider = PrincipalSlider::create([
      'title' => $request->title,
      'description' => $request->description,
      'link' => $request->link,
      'status' => $request->has('status') ? $request->status : '1',
      'priority' => $request->priority,
      'image' => $path.$imageName,
      'image_mobile' => $path.$imageNameMobile,
    ]);
    return redirect()->route('principal_slider.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
      //
  }

  
  public function edit($id)
  {
    $slide = PrincipalSlider::find($id);
    if ($slide) {
      return view('admin.principal_slider.edit', compact('slide'));
    }else {
      return redirect()->route('principal_slider.index')->with('error', 'Item no encontrado');;
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
    return redirect()->route('principal_slider.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $slide = PrincipalSlider::find($id);
      $slide->title = $request->title;
      $slide->description = $request->description;
      $slide->priority = $request->priority;
      $slide->status = $request->status;
      $slide->link = $request->link;
      $path = 'storage/images/principal_slider/';
      if($request->image){
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        $slide->image = $path.$imageName;
      }
      if($request->image_mobile){
        $imageName = time().'mobile.'.request()->image_mobile->getClientOriginalExtension();
        request()->image_mobile->move(public_path($path), $imageName);
        $slide->image_mobile = $path.$imageName;
      }
      if($slide->save()){
        return redirect()->route('principal_slider.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('principal_slider.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('principal_slider.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
    $principal_slider = PrincipalSlider::find($id);
    if ($principal_slider) {
      $principal_slider->delete();
      return redirect()->route('principal_slider.index')->with('success','Item eliminado con exito');
    }
    return redirect()->route('principal_slider.index')->with('error','Error al eliminar Registro');   
  }

  private function rules() {
    return [
      'title' => 'required',
      'description' => 'required',
      'link' => 'required',
      'image' => 'image|mimes:jpeg,bmp,png,jpg',
      'priority' => 'required|numeric',
    ];
  }

  private function errorMessages() {
    return [
      'title.required' => 'Titulo es un campo requerido',
      'description.required' => 'Descripción es un campo requerido',
      'link.required' => 'Enlace es un campo requerido',
      'priority.required' => 'Prioridad es un campo requerido',
      'priority.numeric' => 'Prioridad debe ser un numero',
      'image.image' => 'Formato de archivo invalido',
    ];
  }
}
