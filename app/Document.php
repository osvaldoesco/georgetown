<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Document extends Model
{
  protected $fillable = ['name', 'description', 'file', 'type',  'status', 'priority', 'duration', 'pages', 'course_id'];    

  public function course(){
    return $this->belongsTo('App\Course');
  }

  public function file_name(){
    $names = explode("/", $this->file);
    return end($names);
  }

}
