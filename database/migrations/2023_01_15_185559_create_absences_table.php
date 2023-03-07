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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employé_id');
            $table->foreign('employé_id')->references('id')->on('employés');
            $table->unsignedBigInteger('type_absence_id');
            $table->foreign('type_absence_id')->references('id')->on('type_absences');
            $table->year('annee');
            $table->integer('mois');
            $table->integer('nb_jours_absence');
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
        Schema::dropIfExists('absences');
    }
};
