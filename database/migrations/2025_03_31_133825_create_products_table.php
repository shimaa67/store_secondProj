<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreign('category_id')->references('id')->on('categorise')->nullable();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
