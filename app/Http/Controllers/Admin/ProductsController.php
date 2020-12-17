<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
   
  public function index()
  {
      $products = Product::paginate(10);
      return view('admin.products.index', compact('products'));
  }

  public function create()
  {
      return view('admin.products.create');
  }

  
  public function store(Request $request)
  {
    $path = 'storage/images/products/';
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path($path), $imageName);
    $product = Product::create([
      'title' => $request->title,
      'description' => $request->description,
      'short_description' => $request->short_description,
      'price' => $request->price,
      'discount' => $request->discount,
      'discount_value' => $request->discount_value,
      'payment_link' => $request->payment_link,
      'status' => $request->has('status') ? $request->status : '1',
      'priority' => $request->priority,
      'image' => $path.$imageName,
    ]);
    return redirect()->route('products.index')->with('success','Item alojado con exito');
  }

  
  public function show($id)
  {
      //
  }

  
  public function edit($id)
  {
    $product = Product::find($id);
    if ($product) {
      return view('admin.products.edit', compact('product'));
    }else {
      return redirect()->route('products.index')->with('error', 'Curso no encontrado');;
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
      return redirect()->route('products.edit', $id)->withErrors($validator)->withInput();
    }

    try {
      $product = Product::find($id);
      $product->title = $request->title;
      $product->short_description = $request->short_description;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->discount = $request->has('discount') ? $request->discount : '0';
      $product->discount_value = $request->discount_value;
      $product->payment_link = $request->payment_link;
      $product->status = $request->has('status') ? $request->status : '0';
      $product->priority = $request->priority;
      if($request->image){
        $path = 'storage/images/products/';
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path($path), $imageName);
        $product->image = $path.$imageName;
      }
      if($product->save()){
        return redirect()->route('products.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('products.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('products.index')->with('error', 'Ocurrio un error al editar');
    }
  }

  
  public function destroy($id)
  {
      $product = Product::find($id);
      if ($product) {
        $product->delete();
        return redirect()->route('products.index')->with('success','Item eliminado con exito');
      }
      return redirect()->route('products.index')->with('error','Error al eliminar Registro');   
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