<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFabricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fabricas', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('avaliar', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fabricas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('avaliar', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
