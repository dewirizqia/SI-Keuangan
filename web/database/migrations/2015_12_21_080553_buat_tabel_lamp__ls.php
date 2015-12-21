<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelLampLs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamp_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ls');
            $table->string('nama', 50);
            $table->string('jabatan', 20);
            $table->integer('jlh_hari');
            $table->double('satuan', 10);
            $table->double('terima');
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
        Schema::drop('lamp_ls');
    }
}
