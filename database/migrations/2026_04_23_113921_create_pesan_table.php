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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id(); // id_pesan

            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // pengirim (bisa user atau driver → tetap refer ke users)
            $table->foreignId('pengirim_id')->constrained('users')->onDelete('cascade');

            $table->text('isi_pesan');

            $table->timestamp('waktu_kirim')->useCurrent();

            $table->enum('status', ['terkirim', 'dibaca'])->default('terkirim');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan');
    }
};
