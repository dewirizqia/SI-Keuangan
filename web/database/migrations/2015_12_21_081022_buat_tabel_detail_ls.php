<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelDetailLs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ls');
            $table->integer('rekapitulasi');
            $table->string('kode_anggaran',15);
            $table->integer('jmlh_penerima');
            $table->double('jmlh_kotor');
            $table->double('pph');
            $table->string('jmlh_bersih',45);
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
        Schema::drop('detail_ls');
    }
}
