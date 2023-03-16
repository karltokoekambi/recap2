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
        Schema::create('regime_mutuelles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->unsignedBigInteger('mutuelle_id');
            $table->foreign('mutuelle_id')->references('id')->on('mutuelles');
            $table->integer('nb_enfants');
            $table->boolean('conjoint');
            $table->date('date_deb_CMU')->nullable();
            $table->date('date_fin_CMU')->nullable();
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
        Schema::dropIfExists('regime_mutuelles');
    }
};
