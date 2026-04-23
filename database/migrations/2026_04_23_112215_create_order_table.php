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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id_order

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');

            $table->text('alamat_asal');
            $table->text('alamat_tujuan');

            $table->decimal('jarak_km', 10, 2)->nullable();
            $table->decimal('harga', 12, 2)->nullable();

            $table->enum('status', [
                'pending',
                'accepted',
                'on_the_way',
                'on_trip',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
