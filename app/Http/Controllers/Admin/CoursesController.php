<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
   
    public function index()
    {
        $courses = Course::all();
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
        //
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
}
