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
    Schema::create('laundry_packages', function (Blueprint $table) {

        $table->id();

        $table->string('name');

        $table->integer('price');

        $table->enum('unit', [
            'kg',
            'pcs'
        ]);

        $table->integer('estimated_days')
              ->default(1);

        $table->text('description')
              ->nullable();

        $table->boolean('is_active')
              ->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_packages');
    }
};
