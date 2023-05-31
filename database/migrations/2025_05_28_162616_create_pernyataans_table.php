<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernyataansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernyataans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->nullable();
            $table->string('nama');
            $table->timestamps();


            $table->foreign('jurusan_id')
            ->references('id')->on('jurusans')
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
        Schema::dropIfExists('pernyataans');
    }
}
