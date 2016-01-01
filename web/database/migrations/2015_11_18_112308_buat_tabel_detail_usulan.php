<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelDetailUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_usulan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usulan');
            $table->integer('nominal');
            $table->string('satuan');
            $table->string('detail');
            $table->integer('harga_satuan');
            $table->integer('jumlah');
            $table->string('jenis_komponen', 10);
            $table->integer('id_subinput');
            $table->integer('id_akun');
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
        Schema::drop('detail_usulan');
    }
}
