<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmallContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_ads_contents', function (Blueprint $table) {
            $table->increments('id')->comment('unikatowy identyfikator');
            $table->integer('small_ads_categories_id')->unsigned()->comment('kategoria towaru');
            $table->integer('small_ads_sub_categories_id')->unsigned()->comment('podkategoria towaru połączona z kategorią');
            //$table->integer('small_ads_user_group_id')->unsigned()->comment('wewnętrzna grupa użytkownika (opcjonalnie) jeśli sprzedaje kilka przedmiotów tego typu');
            $table->enum('small_ads_classified_enum', ['sprzedam','kupię','zamienię','oddam','wypożyczę'])->comment('typ ogłoszenia, sprzedak kupie zamienie itd..');
            $table->integer('users_id')->unsigned()->comment('id użytkownika który dodał ogłoszenie');
            $table->string('name', 250)->comment('nazwa sprzedawanego towaru');
            $table->text('lead')->comment('krótki opis sprzedawanego towaru, max 512 znaków')->collation('utf8_polish_ci');
            $table->text('description')->comment('opis sprzedawanego towaru')->collation('utf8_polish_ci');
            $table->decimal('price', 10, 2)->comment('cena');
            $table->integer('items')->unsigned()->comment('ilosc sztuk');
            $table->integer('adress_id')->unsigned()->default(0)->comment('adres pobierany z osobnej tabeli');
            $table->integer('views')->unsigned()->default(0)->comment('ile było odsłon danego ogłoszenia, do statystyk');
            $table->tinyInteger('portal_id')->unsigned()->default(0)->comment('id portalu z którego uzytkownik dodawał ogłoszenie');
            $table->dateTime('date_start')->comment('data pojawienia się ogłoszenia na portalu (można zrobić opóźnienie)');
            $table->dateTime('date_end')->comment('data_waznosci ogłoszenia');
            $table->enum('condition', ['nowe','używane'])->comment('rodzaj sprzedawanego produktu - nowy czy uzywany');
            $table->tinyInteger('top')->default(0)->comment('czy ogłoszenie jest promowane (przed innymi)');
            //zmiana znacznikow, na wiecej możliwości
            
            $table->tinyInteger('promoted')->default(0)->comment('czy ogłoszenie jest promowane');
            $table->tinyInteger('bestseller')->default(0)->comment('czy ogłoszenie jest bestsellerem');
            $table->tinyInteger('sale')->default(0)->comment('czy ogłoszenie jest wyprzedażowe');            
            
            $table->enum('highlighted', ['#ffffff','#c8cdff','#ffc8dd','#c8ffdf','#eac8ff','#fff7c8'])->default('#ffffff')->comment('czy ogłoszenie jest wyróżnione (kolor)');            
            $table->enum('recomended',['none','Promocja!','Wyprzedaż','Przecena','Bestseller'])->default('none')->comment('active - normalne opłacone ogłoszenie, disabled - wyłaczone przez uzytkownika lub z wygasłym terminem, mozliwe do ponowienia, removed - usunięte przez moderatora, nie wyświetla się użytkownikowi, blocked - zablokowane do wyjaśnienia do wyjasnienia, nie mozna go ponowić');
            $table->enum('status',['unfinished','active','disabled','removed','blocked'])->default('unfinished')->comment('active - normalne opłacone ogłoszenie, disabled - wyłaczone przez uzytkownika lub z wygasłym terminem, mozliwe do ponowienia, removed - usunięte przez moderatora, nie wyświetla się użytkownikowi, blocked - zablokowane do wyjaśnienia do wyjasnienia, nie mozna go ponowić');
            $table->enum('invoice', ['Nie wystawiam faktury','Faktura VAT','Faktura Vat-marża','Faktura bez VAT'])->comment('rodzaj dokumentu sprzedaży, faktura, paragon itd..');           
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
        Schema::dropIfExists('small_ads_contents');
    }
}
