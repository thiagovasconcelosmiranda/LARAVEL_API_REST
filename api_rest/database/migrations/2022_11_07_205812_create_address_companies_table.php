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
        Schema::create('address_companies', function (Blueprint $table) {
            $table->id();
            $table->string('address',100);
            $table->integer('number');
            $table->string('cep',30);
            $table->string('district',30);
            $table->string('city', 30);
            $table->string('state', 30);

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
        Schema::dropIfExists('address_companies');
    }
};
