<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ads_categories_id')->unsigned()->comment('kategoria nadrzędna towaru');
            $table->string('name', 250)->comment('nazwa podkategorii');
            $table->string('link', 75)->comment('link na jaki subkategoria jest zamieniana (bez pl znaków itd)');
            $table->string('description', 250)->nullable()->comment('opis.. wyświetlany w dymku, dla cielaczków');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_sub_categories');
    }
}
