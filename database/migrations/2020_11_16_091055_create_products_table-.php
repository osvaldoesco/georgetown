<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title')->nullable();
        $table->string('image');
        $table->text('short_description');
        $table->text('description');
        $table->tinyInteger('status')->default('0')->nullable();
        $table->tinyInteger('discount')->default('0')->nullable();
        $table->string('discount_value')->nullable();
        $table->text('payment_link');
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
      Schema::dropIfExists('products');
    }
}
