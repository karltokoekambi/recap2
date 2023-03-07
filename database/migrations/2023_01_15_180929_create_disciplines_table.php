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
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employé_id');
            $table->foreign('employé_id')->references('id')->on('employés');
            $table->date('remise_convocation')->nullable();
            $table->date('date_convocation')->nullable();
            $table->longText('faits_reprochés');
            $table->mediumText('sanction');
            $table->date('date_notification')->nullable();
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
        Schema::dropIfExists('disciplines');
    }
};
