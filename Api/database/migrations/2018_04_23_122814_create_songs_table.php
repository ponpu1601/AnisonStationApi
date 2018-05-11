<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',256)->default('');
            $table->string('kana_title',256)->default('');
            $table->string('other_title_01',256)->default('');
            $table->string('other_title_02',256)->default('');
            $table->unsignedbigInteger('anisoninfo_song_id');
            $table->unsignedbigInteger('program_id');
            $table->unsignedbigInteger('song_role_id');
            $table->unsignedbigInteger('singer_id');
            $table->date('released_on')->default('0000-00-00');
            $table->timestamps();
            $table->unique(['anisoninfo_song_id','program_id','song_role_id','singer_id'],'uq_songs_01');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('song_role_id')->references('id')->on('song_roles');
            $table->foreign('singer_id')->references('id')->on('singers');
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
        Schema::dropIfExists('songs');
    }
}
