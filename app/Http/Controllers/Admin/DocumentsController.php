<?php

namespace App\Http\Controllers\Admin;

use Validator;
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

    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );

    if ($validator->fails()) {
      return redirect()->route('document.create', $id)->withErrors($validator)->withInput();
    }

    try {
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
    } catch (\Exception $e) {
      return redirect()->route('documents.index')->with('error', 'Ocurrio un error al agregar documento');
    }
    return redirect()->route('documents.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
    
  }

   
  public function edit($id)
  {
    $courses = Course::all();
    $document = Document::find($id);
    if ($document) {
      return view('admin.documents.edit', compact('document', 'courses'));
    }else {
      return redirect()->route('documents.index')->with('error', 'Documento no encontrado');;
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
      return redirect()->route('document.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $document = Document::find($id);
      $document->name = $request->name;
      $document->description = $request->description;
      $document->status = $request->has('status') ? $request->status : '1';
      $document->course_id = $request->course_id;
      $document->type = $request->type;
      $document->pages = $request->pages;
      $document->duration = $request->duration;
      $document->priority = $request->priority;
      if($request->file){
        $path = 'storage/documents/';
        $fileName = request()->file->getClientOriginalName();
        request()->file->move(public_path($path), $fileName);
        $document->file = $path.$fileName;
      }
      if($document->save()){
        return redirect()->route('documents.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('documents.index')->with('error', 'Ocurrio un error al editar documento');    
      }
    } catch (\Exception $e) {
      return redirect()->route('documents.index')->with('error', 'Ocurrio un error al editar documento');
    }
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

  //Functionality
  private function rules() {
    return [
      'name' => 'required',
      'description' => 'required',
      'priority' => 'required|numeric',
    ];
  }

  private function errorMessages() {
    return [
      'name.required' => 'Nombrede archivo es un campo requerido',
      'description.required' => 'Descripción es un campo requerido',
      'priority.numeric' => 'Prioridad debe ser un número',
    ];
  }
}
