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
    Schema::table('reservasis', function (Blueprint $table) {
        $table->string('snap_token')->nullable()->after('total_harga');
    });
}

public function down()
{
    Schema::table('reservasis', function (Blueprint $table) {
        $table->dropColumn('snap_token');
    });
}
};
