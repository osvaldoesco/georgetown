<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $fillable = ['name', 'description', 'file', 'type',  'status', 'priority', 'duration', 'pages'];    
}
