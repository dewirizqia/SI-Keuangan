<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelDetailSpj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_spj', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_spj');
            $table->string('nama');
            $table->string('jabatan');
            $table->integer('jumlah_jam');
            $table->string('satuan');
            $table->double('terima_kotor');
            $table->double('pajak');
            $table->double('terima_bersih');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_spj');
    }}
