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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->string('status_transaksi')->default('PENDING', 'SUCCESS', 'FAILED');
            $table->renameColumn('jumlah_barang', 'harga_asuransi');
            $table->renameColumn('harga_barang', 'harga_pengiriman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->string('status_transaksi')->default('PENDING', 'SUCCESS', 'FAILED');
            $table->renameColumn('jumlah_barang', 'harga_asuransi');
            $table->renameColumn('harga_barang', 'harga_pengiriman');
        });
    }
};
