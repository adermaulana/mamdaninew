<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesMinatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_minats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->foreignId('jurusan_id');
            $table->foreignId('pernyataan_id');
            $table->string('hasil');
            $table->timestamps();

            $table->foreign('peserta_id')
            ->references('id')->on('pesertas')
            ->onDelete('cascade');

            $table->foreign('jurusan_id')
            ->references('id')->on('jurusans')
            ->onDelete('cascade');

            $table->foreign('pernyataan_id')
            ->references('id')->on('pernyataans')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tes_minats');
    }
}
