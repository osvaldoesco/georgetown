<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = ['start', 'end', 'type', 'status', 'priority'];

  public function typeText(){
    $text = '';
    switch($this->type){
      case 1:
        $text = 'Semanales';
      break;
      case 2:
        $text = 'Sabatinoss';
      break;
      case 3:
        $text = 'Dominicales';
      break;
    }
    return $text;
  }
}