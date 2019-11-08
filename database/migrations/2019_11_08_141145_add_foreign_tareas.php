<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id')
                  ->references('id')->on('categorias')
                  ->onDelete('cascade')
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
        Schema::table('tareas', function (Blueprint $table) {
            $table->dropForeign('tareas_categorias_id_foreign');
        });
    }
}
