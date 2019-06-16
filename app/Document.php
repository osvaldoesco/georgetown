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

  public function getClassIcon(){
    $name = '';
    switch ($this->type) {
      case 1:
        $name = 'fa-volume-up';
        break;
      case 2:
        $name = 'fa-file-pdf';
        break;
      case 3:
        $name = 'fa-video';
        break;
      case 4:
        $name = 'fa-file-word';
        break;
      case 5:
        $name = 'fa-file-archive';
        break;
      case 6:
        $name = 'fa-info-circle';
        break;
      default:
        $name = '';
    }
  return $name;
  }

}