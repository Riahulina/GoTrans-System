<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // relasi
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');

            // alamat
            $table->text('alamat_asal');
            $table->text('alamat_tujuan');

            // koordinat pickup
            $table->decimal('pickup_lat', 10, 7);
            $table->decimal('pickup_lng', 10, 7);

            // koordinat tujuan
            $table->decimal('tujuan_lat', 10, 7);
            $table->decimal('tujuan_lng', 10, 7);

            // order info
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

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
