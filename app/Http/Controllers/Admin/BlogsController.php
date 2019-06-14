<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
   
  public function index()
  {
    $blogs = Blog::orderBy('created_at', 'DESC')->paginate(10);
    return view('admin.blogs.index', compact('blogs'));
  }

  public function create()
  {
    return view('admin.blogs.create');
  }

  
  public function store(Request $request)
  {

    $validator = Validator::make(
      $request->all(),
      $this->rules(),
      $this->errorMessages()
    );

    if ($validator->fails()) {
      return redirect()->route('blogs.create')->withErrors($validator->messages())->withInput();
    }

    $path = 'storage/images/blogs/';
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path($path), $imageName);
    $smallImageName = time().'_small.'.request()->small_image->getClientOriginalExtension();
    request()->small_image->move(public_path($path), $smallImageName);
    $blog = Blog::create([
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'type' => $request->type,
      'description' => $request->description,
      'short_description' => $request->short_description,
      'status' => $request->has('status') ? $request->status : '1',
      'priority' => $request->priority,
      'image' => $path.$imageName,
      'small_image' => $path.$smallImageName,
    ]);
    return redirect()->route('blogs.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
    //
  }

  
  public function edit($id)
  {
    $blog = Blog::find($id);
    if ($blog) {
      return view('admin.blogs.edit', compact('blog'));
    }else {
      return redirect()->route('blogs.index')->with('error', 'Item no encontrado');;
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
      return redirect()->route('blogs.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $blog = Blog::find($id);
      $blog->title = $request->title;
      $blog->short_description = $request->short_description;
      $blog->description = $request->description;
      $blog->status = $request->has('status') ? $request->status : '1';
      $blog->type = $request->type;
      $blog->priority = $request->priority;
      if($request->image){
        $path = 'storage/images/blogs/';
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        $blog->image = $path.$imageName;
      }
      if($request->small_image){
        $path = 'storage/images/blogs/';
        $smallImageName = time().'_small.'.request()->small_image->getClientOriginalExtension();
        request()->small_image->move(public_path($path), $smallImageName);
        $blog->small_image = $path.$smallImageName;
      }
      if($blog->save()){
        return redirect()->route('blogs.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('blogs.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('blogs.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
      $blog = Blog::find($id);
      if ($blog) {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','Item eliminado con exito');
      }
      return redirect()->route('blogs.index')->with('error','Error al eliminar Registro');   
  }

  private function rules() {
    return [
      'title' => 'required',
      'short_description' => 'required',
      'description' => 'required',
      'image' => 'image|mimes:jpeg,bmp,png,jpg',
      'small_image' => 'image|mimes:jpeg,bmp,png,jpg',
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
      'small_image.uploaded' => 'Formato de archivo invalido',
    ];
  }
}