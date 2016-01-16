<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomLs2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ls', function (Blueprint $table) {
            $table->integer('kode_akun')->after('kode_anggaran');
            $table->date('tgl_sk')->after('no_sk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ls', function (Blueprint $table) {
            $table->dropColumn('kode_akun');
            $table->dropColumn('tgl_sk');
        });
    }
}
