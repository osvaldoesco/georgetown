<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
  protected $fillable = ['title', 'image', 'status', 'priority'];
}
