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
        Schema::table('users', function (Blueprint $table) {
            $table->longText('alamat1')->nullable()->change();
            $table->longText('alamat2')->nullable()->change();
            $table->integer('provinsi_id')->nullable()->change();
            $table->integer('kota_id')->nullable()->change();
            $table->string('kode_pos')->nullable()->change();
            $table->string('negara')->nullable()->change();
            $table->string('nohp')->nullable()->change();
            $table->integer('store_status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('alamat1')->nullable(false)->change();
            $table->longText('alamat2')->nullable(false)->change();
            $table->integer('provinsi_id')->nullable(false)->change();
            $table->integer('kota_id')->nullable(false)->change();
            $table->string('kode_pos')->nullable(false)->change();
            $table->string('negara')->nullable(false)->change();
            $table->string('nohp')->nullable(false)->change();
            $table->integer('store_status')->nullable(false)->change();
        });
    }
};
