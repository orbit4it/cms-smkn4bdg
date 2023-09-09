<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignIdStudiToMataPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mata_pelajaran' , function (Blueprint $table) {
            $table->integer('id_studi')->unsigned()->after('id_mata_pelajaran');
            $table->foreign('id_studi')->references('id_studi')->on('studi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table ('mata_pelajaran' , function (Blueprint $table) {
            $table->dropForeign('mata_pelajaran_id_studi_foreign');
            $table->dropColumn('id_studi');
        });
    }
}
