<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelRincianPerhitungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_perhitungan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detail_usulan');
            $table->integer('nominal');
            $table->string('satuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rincian_perhitungan');
    }
}
