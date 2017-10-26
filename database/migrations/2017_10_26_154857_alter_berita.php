<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berita', function(Blueprint $table) {
            $table->string('judul_berita', 150)->change();
            $table->renameColumn('judul_berita', 'judul');
            $table->renameColumn('isi_berita', 'deskripsi');
            
            $table->integer('id_kategori')->after('judul_berita');
            $table->string('slug', 250)->after('isi_berita');
            $table->string('foto')->nullable()->after('slug');
            $table->integer('hits')->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berita', function(Blueprint $table) {
            $table->string('judul', 255)->change();
            $table->renameColumn('judul', 'judul_berita');
            $table->renameColumn('deskripsi', 'isi_berita');
            
            $table->dropColumn(['id_kategori', 'slug', 'foto', 'hits']);
        });
    }
}
