<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->comment('id użytkownika który dodał ogłoszenie');
            $table->string('name', 250)->comment('nazwa sprzedawanego samochodu, np. super Opel Astra! Niemiec płakał jak sprzedawał...');
            $table->text('lead')->comment('krótki opis sprzedawanego samochodu do wyświetlania na liście')->collation('utf8_polish_ci');
            $table->text('description')->comment('opis sprzedawanego samochodu')->collation('utf8_polish_ci');
            $table->integer('cars_brands_id')->unsigned()->comment('marka pojazdu');
            $table->integer('cars_models_id')->unsigned()->comment('model pojazdu');
            $table->integer('cars_body_id')->unsigned()->comment('nadwozie sedan kombi itd.. zróżnicowane od modelu');
            $table->string('color', 50)->comment('kolor pojazdu, 50 liter powinno styknac');
            $table->dateTime('date_start')->comment('data wyswietlenia ogłoszenia');
            $table->dateTime('date_end')->comment('data zakonczenia ogłoszenia');
            $table->dateTime('date_production')->comment('data produkcji');
            $table->dateTime('date_registration')->comment('data prodpierwszej rejestracji');
            $table->dateTime('country_registration')->comment('kraj rejestracji - z którego pochodzi auto');
            $table->integer('power')->unsigned()->comment('moc silnika (Konie mechaniczne)');
            $table->integer('capacity')->unsigned()->comment('pojemnosc (cm 3)');
            $table->unsignedTinyInteger('doors_number')->comment('liczba drzwi');
            $table->unsignedTinyInteger('seats')->comment('liczba miejsc siedzących');
            $table->enum('condition', ['nowy','używany'])->comment('stan pojazdu - nowy / używany');
            $table->unsignedTinyInteger('demaged')->comment('liczba miejsc siedzących');
            $table->unsignedTinyInteger('accident')->comment('liczba miejsc siedzących');
            $table->integer('views')->unsigned()->default(0)->comment('ile było odsłon danego ogłoszenia, do statystyk');
            $table->unsignedTinyInteger('recomended')->default(0)->comment('czy ogłoszenie jest rekomendowane');
            $table->enum('highlighted', ['#ffffff','#cfbcf8','#bcf8bc','#f1f8bc','#f8c0bc','#f8bcf5'])->default("#ffffff")->comment('czy ogłoszenie jest wyróżnione (kolor)');
            $table->unsignedTinyInteger('promoted')->default(0)->comment('czy ogłoszenie jest promowane (przed innymi)');
            $table->unsignedTinyInteger('active')->default(0)->comment('czy ogloszenie jet aktywne (ustawiane jak cała procedura dodawania ogłoszenia dojdzie do konca)');
            $table->enum('invoice', ['nie wystawiam faktury','faktura VAT','Faktura Vat-marża','faktura bez VAT'])->comment('stan pojazdu - nowy / używany');
            $table->unsignedTinyInteger('mileage')->comment('przebieg samochodu');
            $table->enum('fuel_type', ['benzyna','disel','benzyna + lpg','elektryczny'])->comment('rodzaj paliwa');
            $table->integer('portal_id')->unsigned()->comment('portal z którego pochodzi ogłoszenie');
            $table->ipAddress('visitor_ip')->comment('ip użytkownika');
            $table->string('visitor_host', 250)->nullable($value = true)->comment('dane z hosta (rev dns) użytkownika'); //rev dns hosta użytkownika - przydtne żeby szybko zlokalizować usługodawcę
            $table->string('visitor_soft', 250)->nullable($value = true)->comment('dane przeglądarki system itd..'); //wiem że to może się wydawać zbyteczne ale czasem policji się przydaje
            $table->string('visitor_proxy', 250)->nullable($value = true)->comment('dane proxy przez które się łączył'); //wiem że to może się wydawać zbyteczne ale czasem policji się przydaje
            $table->smallInteger('visitor_port')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_contents');
    }
}
