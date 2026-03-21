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
        Schema::table('purchases', function (Blueprint $table) {
            // Tambahkan kolom category setelah item_name
            // Kita kasih nullable() biar data lama nggak error
            $table->string('category')->nullable()->after('item_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            // Hapus kolom kalau migration di-rollback
            $table->dropColumn('category');
        });
    }
};