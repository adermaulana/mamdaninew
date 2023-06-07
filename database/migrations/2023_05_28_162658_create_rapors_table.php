<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->float('semester_1');
            $table->float('semester_2');
            $table->float('semester_3');
            $table->float('semester_4');
            $table->float('semester_5');
            $table->float('semester_6');
            $table->timestamps();

            $table->foreign('peserta_id')
            ->references('id')->on('pesertas')
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
        Schema::dropIfExists('rapors');
    }
}
