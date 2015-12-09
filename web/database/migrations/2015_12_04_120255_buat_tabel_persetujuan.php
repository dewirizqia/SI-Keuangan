<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPersetujuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('persetujuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usulan');
            $table->integer('id_user');
            $table->string('keterangan', 15);
            $table->text('komentar');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('persetujuan');
    }
}
