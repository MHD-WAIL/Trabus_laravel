<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("card_type");
            $table->string("number");
            // $table->enum("type",["type","type 2","type 3"]);
            //$table->foreignId('card_type_id')->references('id')->on('cards');
            $table->string("balance")->default('');
            $table->enum("vehicle", ["Bus", "MetroBus"]);
            $table->enum("customer_type", ["Teacher", "Student", "FullFare"]);
            // foreign keys always singular cards x card ...
            // if you write cards laravel will not see the key laravel always expect singular_id
            $table->foreignId('istanbul_card_id')->nullable()->references('id')->on('istanbul_cards');
            $table->foreignId('electronic_card_id')->nullable()->references('id')->on('electronic_cards');
            $table->foreignId('blue_card_id')->nullable()->references('id')->on('blue_cards');
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
        Schema::dropIfExists('cards');
    }
}
