<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeasuresidToTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function(Blueprint $table){
            $table->integer('measure_id')->unsigned()->after('id');
            $table->foreign('measure_id')->references('id')->on('measures')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types',function(Blueprint $table){
            $table->dropForeign('types_measure_id_foreign');
        });
    }
}
