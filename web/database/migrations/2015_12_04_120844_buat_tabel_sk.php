<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bagian');
            $table->integer('id_user');
            $table->string('nomor');
            $table->string('tentang');
            $table->string('tempat');
            $table->date('tgl');
            $table->string('penimbang');
            $table->string('pengingat');
            $table->string('keputusan');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sk');
    }
}
