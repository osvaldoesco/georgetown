<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
    //try {
      $path = 'storage/documents/';
      $fileName = request()->file->getClientOriginalName();
      request()->file->move(public_path($path), $fileName);
      $course = Document::create([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->has('status') ? $request->status : '1',
        'course_id' => $request->course_id,
        'type' => $request->type,
        'pages' => $request->pages,
        'duration' => $request->duration,
        'priority' => $request->priority,
        'file' => $path.$fileName,
      ]);
    // } catch (\Exception $e) {
    //   return redirect()->route('documents.index')->with('error', 'Ocurrio un error al agregar documento');
    // }
    return redirect()->route('documents.index')->with('success','Item alojado con exito');
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
    try{
      $document = Document::find($id);
      if ($document) {
        File::delete($document->file);
        $document->delete();
        return redirect()->route('documents.index')->with('success','Item eliminado con exito');
      }
      return redirect()->route('documents.index')->with('error','Error al eliminar Registro');   
    } catch(\Exception $e){
      return redirect()->route('documents.index')->with('error','Error al eliminar Registro');   
    }
  }
}
