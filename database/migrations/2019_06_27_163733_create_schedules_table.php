<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('schedules', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('start')->nullable();
      $table->string('end')->nullable();
      $table->integer('type')->nullable();
      $table->tinyInteger('status')->default('0')->nullable();
      $table->integer('priority')->default(20);
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
    Schema::dropIfExists('schedules');
  }
}
