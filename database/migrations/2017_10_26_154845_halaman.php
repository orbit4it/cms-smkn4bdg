<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Halaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaman', function(Blueprint $table) {
            $table->increments('id_halaman');
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->string('slug', 250);
            $table->string('foto', 250)->nullable();
            $table->integer('hits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halaman');
    }
}
