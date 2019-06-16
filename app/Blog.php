<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = ['title', 'image', 'short_description', 'description', 'status', 'prioririty', 'type', 'slug', 'small_image', 'status'];

  public function limitatedDesc(){
    return substr($this->short_description, 0, 50) . '...';
  }

  public function typeText(){
    return $this->type == 1 ? 'Evento' : 'Noticia';
  }

  public function getFormatedDate(){
    return date("d/m/Y", strtotime($this->created_at));;
  }
  
}
