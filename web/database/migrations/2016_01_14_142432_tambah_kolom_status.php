<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spj', function (Blueprint $table) {
            $table->string('status', 10)->after('total');
        });

        Schema::table('ls', function (Blueprint $table) {
            $table->string('status', 10)->after('jmlh_bersih');
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
           $table->dropColumn('status');
        });

        Schema::table('ls', function (Blueprint $table) {
           $table->dropColumn('status');
        });
    }
}
