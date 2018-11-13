<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->integer('cuantity');
            $table->double('unitary',15,8);
            $table->enum('status',['PENDING','FINISHED'])->default('PENDING');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('sales');
    }
}
