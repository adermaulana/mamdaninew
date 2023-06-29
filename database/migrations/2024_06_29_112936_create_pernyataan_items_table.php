<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernyataanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernyataan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->foreignId('pernyataan_id');
            $table->foreignId('minat_id');
            $table->timestamps();

            $table->foreign('peserta_id')
            ->references('id')->on('pesertas')
            ->onDelete('cascade');

            $table->foreign('pernyataan_id')
            ->references('id')->on('pernyataans')
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
        Schema::dropIfExists('pernyataan_items');
    }
}
