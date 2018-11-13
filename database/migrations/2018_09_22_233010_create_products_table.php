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

            $table->integer('type_id')->unsigned();
            $table->string('name',128)->unique();
            $table->integer('min');//Minimo de Strock Se debe modificar para que la cantidad acepte decimales
            $table->enum('status', ['PUBLIC','PRIVATE'])->default('PUBLIC');

            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')
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
        Schema::dropIfExists('products');
    }
}
