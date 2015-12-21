<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelLs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bagian');
            $table->string('no_sk', 20);
            $table->string('nama_kegiatan', 45);
            $table->string('keterangan', 45);
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
        Schema::drop('ls');
    }
}
