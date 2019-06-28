<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = ['title', 'image', 'section_description', 'short_description', 'description', 'status', 'priority', 'section', 'section_title'];

  public function documents(){
    return $this->hasMany('App\Document');
  }

  public function limitatedDesc(){
    return substr($this->short_description, 0, 50) . '...';
  }

  public function getCourseName(){
    $val = '';
    switch($this->section){
      case 0:
        $val = 'Sin asignar'; 
      break;
      case 1:
        $val = 'Sección 1'; 
      break;
      case 2:
        $val = 'Sección 2'; 
      break;
      case 3:
        $val = 'Sección 3'; 
      break;
      case 4:
        $val = 'Sección 4'; 
      break;
      case 5:
        $val = 'Kids'; 
      break;
      default:
        $val ='Sin asignar';
    }
    return $val;
  }

}
