<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
   
  public function index()
  {
      $courses = Course::paginate(10);
      return view('admin.courses.index', compact('courses'));
  }

  public function create()
  {
      return view('admin.courses.create');
  }

  
  public function store(Request $request)
  {
    $path = 'storage/images/courses/';
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path($path), $imageName);
    $course = Course::create([
      'title' => $request->title,
      'description' => $request->description,
      'short_description' => $request->short_description,
      'section' => $request->section,
      'section_title' => $request->section_title,
      'section_description' => $request->section_description,
      'status' => $request->has('status') ? $request->status : '1',
      'priority' => $request->priority,
      'image' => $path.$imageName,
    ]);
    return redirect()->route('courses.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
      //
  }

  
  public function edit($id)
  {
    $course = Course::find($id);
    if ($course) {
      return view('admin.courses.edit', compact('course'));
    }else {
      return redirect()->route('courses.index')->with('error', 'Curso no encontrado');;
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
      return redirect()->route('courses.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $course = Course::find($id);
      $course->title = $request->title;
      $course->short_description = $request->short_description;
      $course->description = $request->description;
      $course->status = $request->has('status') ? $request->status : '1';
      $course->priority = $request->priority;
      $course->section = $request->section;
      $course->section_description = $request->section_description;
      $course->section_title = $request->section_title;
      if($request->image){
        $path = 'storage/images/courses/';
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        $course->image = $path.$imageName;
      }
      if($course->save()){
        return redirect()->route('courses.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('courses.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('courses.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
      $course = Course::find($id);
      if ($course) {
        $course->delete();
        return redirect()->route('courses.index')->with('success','Item eliminado con exito');
      }
      return redirect()->route('courses.index')->with('error','Error al eliminar Registro');   
  }

  private function rules() {
    return [
      'title' => 'required',
      'short_description' => 'required',
      'description' => 'required',
      'image' => 'image|mimes:jpeg,bmp,png,jpg',
      'priority' => 'required|numeric',
    ];
  }

  private function errorMessages() {
    return [
      'title.required' => 'Título es un campo requerido',
      'short_description.required' => 'Descripción pequeña es un campo requerido',
      'description.required' => 'Descripción es un campo requerido',
      'priority.numeric' => 'Prioridad debe ser un número',
      'image.uploaded' => 'Formato de archivo invalido',
    ];
  }
}