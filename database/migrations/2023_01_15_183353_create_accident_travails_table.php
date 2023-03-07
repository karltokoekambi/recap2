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
        Schema::create('accident_travails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employé_id');
            $table->foreign('employé_id')->references('id')->on('employés');
            $table->date('date_accident');
            $table->date('date_declaration');
            $table->boolean('lieu');//0: trajet, 1: travail
            $table->longText('commentaire');
            $table->longText('lesions');
            $table->date('date_debut_arret');
            $table->date('date_fin_arret');
            $table->boolean('prise_en_charge_CPAM')->default(false);
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
        Schema::dropIfExists('accident_travails');
    }
};
