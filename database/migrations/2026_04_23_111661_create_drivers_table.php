<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');

            $table->string('plat_nomor', 20);

            $table->enum('status', [
                'online',
                'offline',
                'busy'
            ])->default('offline');

            // lokasi driver sekarang
            $table->decimal('current_lat', 10, 7)->nullable();
            $table->decimal('current_lng', 10, 7)->nullable();

            // status akun
            $table->boolean('is_active')->default(true);

            // statistik
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->integer('total_trip')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
