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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            // Se define el campo foreign key del federal_entity que esta en la bd zip
            $table->unsignedBigInteger('federal_entity_id');
            // Se define el campo foreign key del state que esta en la bd zip del settlement que esta en la bd zip
            $table->unsignedBigInteger('settlement_id');
            // Se define l campo foreign key del municipalities que esta en la bd zip
            $table->unsignedBigInteger('municipality_id');
            // Se define el key del ciudad en la base de datos
            $table->string('zip_code');
            // Se define el nombre del ciudad en la base de datos
            $table->string('locality')->nullable();
            // Se define la foreign del federal_entity que esta en la bd zip
            $table->foreign('federal_entity_id')->references('id')->on('federal_entities');
            // Se define la foreign del settlement que esta en la bd zip
            $table->foreign('settlement_id')->references('id')->on('settlements');
            // Se define la foreign del municipalities que esta en la bd zip
            $table->foreign('municipality_id')->references('id')->on('municipalities');
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
        Schema::dropIfExists('cities');
    }
};
