<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travail_nuits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employé_id');
            $table->foreign('employé_id')->references('id')->on('employés');
            $table->year('annee');
            $table->integer('mois');
            $table->bigInteger('nb_heures');
            $table->integer('nb_nuits_penibles');
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
        Schema::dropIfExists('travail_nuits');
    }
};
