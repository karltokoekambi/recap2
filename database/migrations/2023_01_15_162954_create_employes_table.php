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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->mediumText('nom');
            $table->mediumText('prenom');
            $table->date('date_naissance');
            $table->date('date_entree');
            $table->date('date_sortie')->nullable();
            $table->unsignedBigInteger('poste_id');
            $table->foreign('poste_id')->references('id')->on('postes');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

            //TAN OU CARTES
            $table->integer('abonnement_TAN')->default(0);//0: non, 1: mensuel, 2: annuel
            $table->date('debut_abonnement_TAN')->nullable();
            $table->date('fin_abonnement_TAN')->nullable();
            $table->float('montant_abonnement_mensuel_TAN')->nullable();
            $table->date('date_don_carte_McBooster')->nullable();
            $table->boolean('papier_McBooster_signe')->default(false);
            $table->date('date_don_carte_commerçant')->nullable();
            $table->boolean('inscription_openclassroom')->default(false);

            //VM
            $table->date('visite_medicale_entree')->nullable();
            $table->date('prochaine_VM')->nullable();
            $table->date('date_demande')->nullable();
            $table->mediumText('observations')->nullable();
            $table->boolean('saisie_webplace')->default(false);
            $table->tinyText('suivi_indiv')->nullable();

            //ETRANGER
            $table->mediumText('nationalite')->nullable();
            $table->date('debut_validite')->nullable();
            $table->date('fin_validite')->nullable();
            $table->bigInteger('numSecu_provisoire')->nullable();

            //RQTH
            $table->date('date_fin_RQTH')->nullable();

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
        Schema::dropIfExists('employes');
    }
};
