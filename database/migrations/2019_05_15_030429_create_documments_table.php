<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocummentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('documments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('description');
        $table->string('type');
        $table->string('duration')->nullable();
        $table->string('pages')->nullable();
        $table->unsignedInteger('course_id');
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('documments');
    }
}
