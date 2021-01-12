<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->increments('id_veiculo');
            $table->integer('id_usuario');
            $table->string('nome_veiculo');
            $table->string('img_veiculo');
            $table->string('link_veiculo');
            $table->string('ano_veiculo');
            $table->string('combustivel_veiculo');
            $table->string('portas_veiculo');
            $table->string('quilometragem_veiculo');
            $table->string('cambio_veiculo');
            $table->string('cor_veiculo');
            $table->decimal('preco_veiculo', 10, 2);
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
        Schema::dropIfExists('artigos');
    }
}
