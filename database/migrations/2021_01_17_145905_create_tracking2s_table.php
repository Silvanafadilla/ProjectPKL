<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracking2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking2s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('positif');
            $table->bigInteger('sembuh');
            $table->bigInteger('meninggal');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_negara');
            $table->foreign('id_negara')->references('id')->on('negaras')->onDelete('cascade');
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
        Schema::dropIfExists('tracking2s');
    }
}
