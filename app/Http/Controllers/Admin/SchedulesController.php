<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchedulesController extends Controller
{
   
  public function index()
  {
    $schedules = Schedule::orderBy('priority')->paginate(10);
    return view('admin.schedules.index', compact('schedules'));
  }

  public function create()
  {
    return view('admin.schedules.create');
  }
  
  public function store(Request $request)
  {
   
    $schedule = Schedule::create([
      'type' => $request->type,
      'start' => $request->start,
      'end' => $request->end,
      'status' => $request->has('status') ? $request->status : '0',
      'priority' => $request->priority,
    ]);
    return redirect()->route('schedules.index')->with('success','Miembro alojado con exito');
  }
  
  public function show($id)
  {
      //
  }

  public function edit($id)
  {
    $schedule = Schedule::find($id);
    if ($schedule) {
      return view('admin.schedules.edit', compact('schedule'));
    }else {
      return redirect()->route('schedules.index')->with('error', 'Horario no encontrado');;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $schedule = Schedule::find($id);
      $schedule->type = $request->type;
      $schedule->start = $request->start;
      $schedule->end = $request->end;
      $schedule->status = $request->has('status') ? $request->status : '0';
      $schedule->priority = $request->priority;
      if($schedule->save()){
        return redirect()->route('schedules.index')->with('success', 'Edición exitosa');
      } else {
        return redirect()->route('schedules.index')->with('error', 'Ocurrio un error al editar');
      }
    } catch (\Exception $e) {
      return redirect()->route('schedules.index')->with('error', 'Ocurrio un error al editar');
    }
  }
  
  public function destroy($id)
  {
    $schedule = Schedule::find($id);
    if ($schedule) {
      $schedule->delete();
      return redirect()->route('schedules.index')->with('success','Miembro eliminado con exito');
    }
    return redirect()->route('schedules.index')->with('error','Error al eliminar Registro');   
  }

  private function rules() {
    return [
      'name' => 'required',
      'position' => 'required',
      'priority' => 'required|numeric',
    ];
  }

  private function errorMessages() {
    return [
      'start.required' => 'Inicio es un campo requerido',
      'end.required' => 'Cargo es un campo requerido',
      'priority.required' => 'Prioridad es un campo requerido',
      'priority.numeric' => 'Prioridad debe ser un numero',
    ];
  }
}
