<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrincipalSlider extends Model
{
  protected $fillable = ['title', 'description', 'image', 'image_mobile', 'link', 'status', 'priority'];    
}
