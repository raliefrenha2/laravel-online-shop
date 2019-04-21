<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('webname')->length(100);
            $table->string('tagline')->length(25)->nullable();
            $table->string('email')->length(50)->nullable();
            $table->string('website')->length(50)->nullable();
            $table->text('keywords')->nullable();
            $table->text('metatext')->nullable();
            $table->string('telephone')->length(50)->nullable();
            $table->string('address')->length(100)->nullable();
            $table->string('facebook')->length(50)->nullable();
            $table->string('instagram')->length(50)->nullable();
            $table->string('twitter')->length(50)->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->length(100)->nullable();
            $table->string('icon')->length(100)->nullable();
            $table->string('payment_account')->length(100)->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
