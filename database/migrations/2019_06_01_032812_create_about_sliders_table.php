<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutSlidersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('about_sliders', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title')->nullable();
      $table->string('image');
      $table->tinyInteger('status')->default('0')->nullable();
      $table->integer('priority')->default(10);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('about_sliders');
  }
}
