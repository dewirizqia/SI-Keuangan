<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPaguKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagu_kegiatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pagu');
            $table->integer('id_subinput');
            $table->double('batasan', 9);
            $table->double('alokasi', 9);
            $table->double('sisa', 9);
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
        Schema::drop('pagu_kegiatan');
    }
}
