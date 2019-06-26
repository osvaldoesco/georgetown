<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = ['title', 'image', 'short_description', 'description', 'status', 'prioririty', 'type', 'slug', 'small_image', 'status', 'programmed_date'];

  public function limitatedDesc(){
    return substr($this->short_description, 0, 50) . '...';
  }

  public function typeText(){
    return $this->type == 1 ? 'Evento' : 'Noticia';
  }

  public function getFormatedDate(){
    if($this->programmed_date){
      return date('d/m/Y', strtotime($this->programmed_date));
    }
    return '';
  }
}
