<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moretableforpsychologue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychologues', function (Blueprint $table) {
            $table->integer('ville')->nullable();
            $table->integer('specialite_id')->nullable();
            $table->text('consultday')->nullable();
            $table->integer('pays')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('psychologue', function (Blueprint $table) {
            //
        });
    }
}
