<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GantiKolomBelanja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('belanja', function (Blueprint $table) {
            $table->dropColumn('no_buku');
            $table->integer('no_bku')->after('tgl');
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
        Schema::table('belanja', function (Blueprint $table) {
            $table->dropColumn('no_bku');
            $table->integer('no_buku')->after('tgl');
            $table -> dropColumn('created_at');
            $table -> dropColumn('updated_at');
        });
    }
}
