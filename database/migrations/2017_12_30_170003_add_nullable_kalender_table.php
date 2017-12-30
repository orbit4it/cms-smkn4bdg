<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableKalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kalender', function (Blueprint $table) {
            $table->dropColumn('end');
        });


        Schema::table('kalender', function (Blueprint $table) {
            $table->date('end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kalender', function (Blueprint $table) {
            $table->dropColumn('end');
        });


        Schema::table('kalender', function (Blueprint $table) {
            $table->date('end');
        });
    }
}
