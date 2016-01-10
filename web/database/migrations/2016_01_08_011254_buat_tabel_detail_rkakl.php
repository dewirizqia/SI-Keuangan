<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelDetailRkakl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_rkakl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rkakl');
            $table->integer('id_akun');
            $table->integer('id_subinput');
            $table->string('detail');
            $table->integer('volume');
            $table->string('satuan', 15);
            $table->double('harga_satuan');
            $table->double('jumlah_biaya');
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
        Schema::drop('detail_rkakl');
    }
}
