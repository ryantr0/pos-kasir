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
    // Rename dulu
    Schema::table('products', function (Blueprint $table) {
        $table->renameColumn('category', 'category_id');
    });

    // Paksa kosongkan isinya biar string 'Snack' hilang
    DB::table('products')->update(['category_id' => null]);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
