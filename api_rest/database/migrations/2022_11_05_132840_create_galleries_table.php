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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('imgOne',30);
            $table->string('imgTwo',30);
            $table->string('imgThree',30);
            $table->string('imgFour',30);
            $table->unsignedBigInteger('announcement_id');
            $table->foreign('announcement_id')->references('id')->on('announcements');

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
        Schema::dropIfExists('galleries');
    }
};
