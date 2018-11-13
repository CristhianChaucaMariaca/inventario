<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ins', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('kardex_id')->unsigned();

            $table->integer('cuantity')->unsigned();
            $table->double('value',15,8);

            $table->timestamps();

            $table->foreign('kardex_id')->references('id')->on('kardexes')
                ->onUpdate('cascade')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ins');
    }
}
