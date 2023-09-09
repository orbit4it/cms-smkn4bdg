<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontak', function (Blueprint $table) {
            $table->increments('id_kontak');
            // $table->text('kontak_key');
            // $table->text('kontak_value');
            // $table->string('kontak_type', 50);
            $table->string('email', 150);
            $table->string('telepon', 20);
            $table->string('alamat', 255);
            $table->text('facebook_link');
            $table->text('twitter_link');
            $table->text('instagram_link');
            $table->text('youtube_link');
            $table->text('tiktok_link');
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
        Schema::dropIfExists('kontak');
    }
}