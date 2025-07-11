<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom 'denda' ke tabel 'peminjamans'
     */
    public function up(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->integer('denda')->nullable()->after('tanggal_kembali');
        });
    }

    /**
     * Menghapus kolom 'denda' jika rollback
     */
    public function down(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropColumn('denda');
        });
    }
};
