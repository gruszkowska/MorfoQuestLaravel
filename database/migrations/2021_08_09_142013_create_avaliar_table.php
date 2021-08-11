<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fabrica_id');
            $table->string('categorizacao');
            $table->string('validade');
            $table->string('relevancia');
            $table->string('acertibilidade');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fabrica_id')->references('id')->on('fabricas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('avaliar');
        Schema::enableForeignKeyConstraints();
    }
}
