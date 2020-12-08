<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_models', function (Blueprint $table) {
            $table->increments('id')->omment('unikatowy identyfikator');
            $table->integer('cars_brands_id')->comment('klucz łączący modele z marką auta');
            $table->integer('cars_type_id')->nullable($value = 1)->comment('znacznik czy osobowy czy dostawczy');
            $table->string('model', 75)->comment('model auta , polaczony z marką');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_models');
    }
}
