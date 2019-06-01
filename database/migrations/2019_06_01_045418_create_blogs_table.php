<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('blogs', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title')->nullable();
      $table->string('slug')->unique();
      $table->text('short_description')->nullable();
      $table->text('description')->nullable();
      $table->string('image');
      $table->integer('priority')->default(10);
      $table->integer('type')->default(1);
      $table->tinyInteger('status')->default('0')->nullable();
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
    Schema::dropIfExists('blogs');
  }
}
