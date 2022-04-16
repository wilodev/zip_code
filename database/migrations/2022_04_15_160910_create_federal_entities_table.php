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
        Schema::create('federal_entities', function (Blueprint $table) {
            $table->id();
            // Se define el key del federal_entities que esta en la bd zip
            $table->integer('key');
            // Se define el nombre del federal_entities que esta en la bd zip
            $table->string('name')->nullable();
            // Se define el code del federal_entities que esta en el bd zip
            $table->string('code')->nullable();
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
        Schema::dropIfExists('federal_entities');
    }
};
