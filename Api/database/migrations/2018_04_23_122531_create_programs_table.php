<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('programs');
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',256)->default('');
            $table->string('kana_title',256)->default('');
            $table->string('other_title_01',256)->default('');
            $table->string('other_title_02',256)->default('');
            $table->unsignedbigInteger('anisoninfo_program_id');
            $table->unsignedbigInteger('program_type_id');
            $table->unsignedbigInteger('game_genre_id');
            $table->date('broadcast_start_on')->default('0000-00-00');
            $table->timestamps();
            $table->unique('anisoninfo_program_id');
            $table->foreign('program_type_id')->references('id')->on('program_types');
            $table->foreign('game_genre_id')->references('id')->on('game_genres');
            $table->charaset='utf8';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
