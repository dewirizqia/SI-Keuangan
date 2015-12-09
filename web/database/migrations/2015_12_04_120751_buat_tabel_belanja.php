<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBelanja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pagu_bagian');
            $table->integer('id_user');
            $table->integer('no_tanda_bukti');
            $table->date('tgl');
            $table->integer('no_buku');
            $table->string('Kode_MA', 20);
            $table->string('MAK', 7);
            $table->string('penerima', 30);
            $table->string('uraian');
            $table->double('jumlah');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('belanja');
    }
}
