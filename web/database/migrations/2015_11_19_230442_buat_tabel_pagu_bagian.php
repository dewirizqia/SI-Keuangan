<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPaguBagian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagu_bagian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pagu');
            $table->integer('id_bagian');
            $table->double('jumlah', 9);
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
        Schema::drop('pagu_bagian');
    }
}
