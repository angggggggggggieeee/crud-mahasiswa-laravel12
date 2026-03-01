<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('kode_mk')->after('kelas');

            $table->foreign('kode_mk')
                  ->references('kode_mk')
                  ->on('matakuliahs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign(['kode_mk']);
            $table->dropColumn('kode_mk');
        });
    }
};