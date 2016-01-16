<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomDetailLs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lamp_ls', function (Blueprint $table) {
            $table->double('pph')->after('terima');
            $table->double('terima_bersih')->after('pph');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lamp_ls', function (Blueprint $table) {
            $table->dropColumn('pph');
            $table->dropColumn('terima_bersih');
        });
    }
}
