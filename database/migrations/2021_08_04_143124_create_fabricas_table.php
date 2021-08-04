<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabricas', function (Blueprint $table) {
            $table->id();
            $table->text('pergunta');
            $table->text('resposta_a');
            $table->text('resposta_b');
            $table->text('resposta_c')->nullable();
            $table->text('resposta_d')->nullable();
            $table->text('correta');
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
        Schema::dropIfExists('fabricas');
    }
}
