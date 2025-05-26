<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kamars', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_kamar')->unique();
        $table->string('tipe_kamar');
        $table->decimal('harga_per_malam', 10, 2);
        $table->enum('status', ['tersedia', 'dipesan'])->default('tersedia');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
