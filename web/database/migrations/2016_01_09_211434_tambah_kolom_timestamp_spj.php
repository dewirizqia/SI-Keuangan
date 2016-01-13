<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomTimestampSpj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spj', function (Blueprint $table) {
            $table->integer('id_akun')->after('id_subinput');
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
        Schema::table('spj', function (Blueprint $table) {
            $table -> dropColumn('created_at');
            $table -> dropColumn('updated_at');
        });
    }
}
