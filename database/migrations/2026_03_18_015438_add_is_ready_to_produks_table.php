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
    // WAJIB pakai 'products' karena itu nama tabel yang sudah Abang buat sebelumnya
    Schema::table('products', function (Blueprint $table) {
        $table->boolean('is_ready')->default(true)->after('price');
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('is_ready');
    });
}
};
