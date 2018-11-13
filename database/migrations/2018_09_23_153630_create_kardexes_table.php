<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKardexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardexes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('sale_id')->nullable()->unsigned();
            $table->integer('buy_id')->nullable()->unsigned();

            $table->integer('balance')->unsigned(); //saldo de inventario Stock
            $table->double('value',15,8);//Valor por mercaderia
            $table->enum('type',['INPUT','OUTPUT']);// identificador para entrada o salida
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('buy_id')->references('id')->on('buys')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kardexes');
    }
}
