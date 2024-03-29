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
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->date('date_accident');
            $table->date('date_declaration');
            $table->boolean('lieu');//0: trajet, 1: travail
            $table->longText('commentaire');
            $table->longText('lesions');
            $table->date('date_debut_arret')->nullable();
            $table->date('date_fin_arret')->nullable();
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
