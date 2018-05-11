<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_types', function (Blueprint $table) {
            $table->bigIncrements('id');
	     $table->string('code',8);
	     $table->string('name',32);
            $table->timestamps();
	     $table->unique('name');
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
        Schema::dropIfExists('program_types');
    }
}
