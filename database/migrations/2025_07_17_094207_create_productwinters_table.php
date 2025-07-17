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
        Schema::create('productwinters', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->integer('price');
            $table->string('image');
            $table->longText('description');
            // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productwinters');
    }
};
