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
        Schema::create('address_clients', function (Blueprint $table) {
            $table->id();
            $table->string('address', 100);
            $table->integer('number');
            $table->string('cep', 30);
            $table->string('district', 30);
            $table->string('city', 30);
            $table->string('state', 30);

            $table->unsignedBigInteger('client_id');

            $table->foreign('Client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('address_clients');
    }
};
