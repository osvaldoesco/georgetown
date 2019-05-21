<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
   
    public function index()
    {
      $documents = Document::all();
      return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
      $courses = Course::all();
      return view('admin.documents.create', compact('courses'));
    }

    
    public function store(Request $request)
    {
      // $path = 'storage/images/courses/';
      // $imageName = time().'.'.request()->image->getClientOriginalExtension();
      // request()->image->move(public_path($path), $imageName);
      // $course = Course::create([
      //     'title' => $request->title,
      //     'description' => $request->description,
      //     'short_description' => $request->short_description,
      //     'status' => $request->has('status') ? $request->status : '1',
      //     'priority' => $request->priority,
      //     'image' => $path.$imageName,
      // ]);
      //   return redirect()->route('courses.index')->with('success','Item alojado con exito');
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
        $document = Document::find($id);
        if ($document) {
          $document->delete();
          return redirect()->route('documents.index')->with('success','Item eliminado con exito');
        }
        return redirect()->route('documents.index')->with('error','Error al eliminar Registro');   
    }
    // File::delete($filename);
}
