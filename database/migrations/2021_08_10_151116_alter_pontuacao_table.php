<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPontuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pontuacao', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_id')->nullable();

            $table->foreign('quiz_id')->references('id')->on('quiz');
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
        Schema::table('pontuacao', function (Blueprint $table) {
            $table->dropColumn('quiz_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
