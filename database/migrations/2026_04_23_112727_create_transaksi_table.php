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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // id_transaksi

            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            $table->decimal('total', 12, 2);
            $table->decimal('komisi_admin', 12, 2);
            $table->decimal('pendapatan_driver', 12, 2);

            $table->enum('metode_bayar', ['cash', 'qris', 'transfer']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
