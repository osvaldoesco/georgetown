<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['title', 'image', 'description', 'short_description', 'description', 'status', 'priority', 'discount', 'discount_value', 'payment_link', 'price'];

  public function limitatedDesc(){
    return substr($this->short_description, 0, 50) . '...';
  }

}
