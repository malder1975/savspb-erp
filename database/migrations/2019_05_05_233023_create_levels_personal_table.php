<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels_personal', function (Blueprint $table) {
            $table->integer('LEVELS_ID')->unsigned();
            $table->integer('PERSONAL_ID')->unsigned();

            //$table->foreign('LEVELS_ID')->references('LEVELS_ID')->on('LEVELS')->onDelete('cascade');
            //$table->foreign('PERSONAL_ID')->references('PERSONAL_ID')->on('PERSONAL')->onDelete('cascade');

            $table->primary(['PERSONAL_ID', 'LEVELS_ID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels_personal');
    }
}
