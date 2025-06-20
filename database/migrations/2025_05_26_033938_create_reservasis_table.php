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
    Schema::create('reservasis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('kamar_id')->constrained()->onDelete('cascade');
        $table->date('check_in');
        $table->date('check_out');
        $table->decimal('total_harga', 10, 2);
        $table->enum('status', ['dipesan', 'selesai', 'dibatalkan'])->default('dipesan');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
