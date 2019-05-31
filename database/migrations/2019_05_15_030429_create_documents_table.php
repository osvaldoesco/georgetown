<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('documents', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->integer('course_id')->unsigned();
        $table->string('name');
        $table->string('description');
        $table->string('file');
        $table->string('type');
        $table->string('duration')->nullable();
        $table->string('pages')->nullable();
        $table->tinyInteger('priority')->default('50')->nullable();
        $table->tinyInteger('status')->default('0')->nullable();
        $table->timestamps();
      });

      Schema::table('documents', function($table) {
        $table->foreign('course_id')->references('id')->on('courses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
