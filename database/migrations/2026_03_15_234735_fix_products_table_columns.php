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
    Schema::table('products', function (Blueprint $table) {
        // Cek dulu biar nggak double
        if (!Schema::hasColumn('products', 'category')) {
            $table->string('category')->nullable()->after('price');
        }
        if (!Schema::hasColumn('products', 'description')) {
            $table->text('description')->nullable()->after('name');
        }
        if (!Schema::hasColumn('products', 'image')) {
            $table->string('image')->nullable()->after('description');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
