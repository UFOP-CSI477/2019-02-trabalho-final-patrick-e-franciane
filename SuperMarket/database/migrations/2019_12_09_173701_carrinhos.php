<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carrinhos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nome_produto');
            $table->unsignedInteger('cliente_id');
            $table->float('preco_produto');
            $table->integer('quantidade');
            $table->timestamps();

            

        });
        
        Schema::table('carrinhos', function (Blueprint $table) {
            $table->foreign('cliente_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}
