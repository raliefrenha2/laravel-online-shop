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
            $table->integer('user_id');
            $table->integer('category_id')->unsigned();
            $table->string('code')->length(20)->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('keywords');
            $table->integer('price')->length(11);
            $table->integer('stock')->length(11);
            $table->string('image');
            $table->float('weight', 8, 2);
            $table->string('size');
            $table->string('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
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
