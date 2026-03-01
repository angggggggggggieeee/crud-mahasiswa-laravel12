<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            // Tambah kolom user_id sebagai foreign key
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('matakuliah_id') // posisi setelah matakuliah_id
                  ->constrained('users')   // relasi ke tabel users
                  ->onDelete('cascade');   // jika user dihapus, data ikut terhapus

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });
    }
};