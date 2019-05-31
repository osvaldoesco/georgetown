<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = ['title', 'image', 'short_description', 'description', 'status', 'priority'];

  public function documents(){
    return $this->hasMany('App\Document');
  }
}
