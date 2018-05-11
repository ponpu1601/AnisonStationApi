<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
	     $table->string('code',8);
	     $table->string('name',32);
            $table->timestamps();
	     $table->unique('code');
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
        Schema::dropIfExists('song_roles');
    }
}
