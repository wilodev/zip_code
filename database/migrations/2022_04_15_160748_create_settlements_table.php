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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            // Se define el campo foreign key del settlement_types que esta en la bd zip
            $table->unsignedBigInteger('settlement_type_id');
            // Se define el key del tipo default settlement que esta en la bd zip
            $table->bigInteger('key')->nullable();
            // Se define el nombre del tipo del settlement que esta en la bd zip
            $table->string('name')->nullable();
            // se define el zone_type del settlement que esta en la bd zip
            $table->string('zone_type')->nullable();
            // Se define la foreign del settlement_types que esta en la bd zip
            $table->foreign('settlement_type_id')->references('id')->on('settlement_types');
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
        Schema::dropIfExists('settlements');
    }
};
