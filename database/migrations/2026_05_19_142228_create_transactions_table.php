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
    Schema::create('transactions', function (Blueprint $table) {

        $table->id();

        $table->string('invoice')->unique();

        $table->foreignId('customer_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('laundry_package_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->float('weight');

        $table->integer('price');

        $table->integer('total_price');

        $table->enum('status', [
            'pending',
            'washing',
            'drying',
            'ironing',
            'done',
            'picked_up',
        ])->default('pending');

        $table->enum('payment_status', [
            'unpaid',
            'paid',
        ])->default('unpaid');

        $table->date('entry_date');

        $table->date('finish_date')->nullable();

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
