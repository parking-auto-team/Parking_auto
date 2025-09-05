<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementVehiculeTable extends Migration
{
    public function up()
    {
        Schema::create('abonnement_vehicule', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('abonnement_id');
            $table->unsignedBigInteger('vehicule_id');

            $table->timestamp('date_debut')->nullable();
            $table->timestamp('date_fin')->nullable();

            $table->timestamps();

            $table->foreign('abonnement_id')->references('id')->on('abonnements')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('abonnement_vehicule');
    }
}
