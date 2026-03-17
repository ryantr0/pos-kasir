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
    Schema::create('purchases', function (Blueprint $table) {
        $table->id();
        $table->string('item_name'); // Tambah ini bang
        $table->integer('qty');
        $table->text('description')->nullable(); // Tambah ini juga
        $table->decimal('purchase_price', 15, 2);
        $table->decimal('total_price', 15, 2);
        $table->date('purchase_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
