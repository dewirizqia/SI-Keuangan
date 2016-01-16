<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomLs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ls', function (Blueprint $table) {
            $table->string('kode_anggaran',15)->after('keterangan');
            $table->integer('jmlh_penerima')->after('kode_anggaran');
            $table->double('jmlh_kotor')->after('jmlh_penerima');
            $table->double('pph')->after('jmlh_kotor');
            $table->double('jmlh_bersih',45)->after('pph');
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
            $table->dropColumn('kode_anggaran');
            $table->dropColumn('jmlh_penerima');
            $table->dropColumn('jmlh_kotor');
            $table->dropColumn('pph');
            $table->dropColumn('jmlh_bersih');
        });
    }
}
