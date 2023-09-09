<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studi', function (Blueprint $table) {
            $table->increments('id_studi');
            $table->string('nama', 255);
            $table->string('slug', 50)->unique();
            $table->text('foto');
            $table->text('deskripsi'); // will be stored html in a string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studi');
    }
}