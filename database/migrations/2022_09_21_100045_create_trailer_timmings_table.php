<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailerTimmingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailer_timmings', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->integer('price');
            $table->unsignedBigInteger('trailer_id');
            $table->foreign('trailer_id')->references('id')->on('trailers')->onDelete('cascade');
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
        Schema::dropIfExists('trailer_timmings');
    }
}
