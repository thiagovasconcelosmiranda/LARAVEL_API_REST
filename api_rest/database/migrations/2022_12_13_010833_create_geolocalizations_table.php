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
        Schema::create('geolocalizations', function (Blueprint $table) {
            $table->id();
            $table->string('latitude', 100);
            $table->string('longitude', 100);
            $table->unsignedBigInteger('companie_id');

            $table->foreign('companie_id')->references('id')->on('companies');
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
        Schema::dropIfExists('geolocalizations');
    }
};
