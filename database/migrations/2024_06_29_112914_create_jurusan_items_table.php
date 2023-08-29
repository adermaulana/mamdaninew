<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->foreignId('jurusan_id');
            $table->foreignId('minat_id');
            $table->double('hasil');
            $table->timestamps();

            
            $table->foreign('peserta_id')
            ->references('id')->on('pesertas')
            ->onDelete('cascade');

            $table->foreign('jurusan_id')
            ->references('id')->on('jurusans')
            ->onDelete('cascade');

            $table->foreign('minat_id')
            ->references('id')->on('tes_minats')
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
        Schema::dropIfExists('jurusan_items');
    }
}
