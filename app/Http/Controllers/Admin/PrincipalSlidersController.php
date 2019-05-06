<?php

namespace App\Http\Controllers\Admin;

use App\PrincipalSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrincipalSlidersController extends Controller
{
   
    public function index()
    {
        $sliders = PrincipalSlider::all();
        return view('admin.principal_slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.principal_slider.create');
    }

    
    public function store(Request $request)
    {
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
        //
    }

    public function update(Request $request, $id)
    {
        //
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
}
