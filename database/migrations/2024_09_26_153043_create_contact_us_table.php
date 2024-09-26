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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->string('name')->length(100);
            $table->text('image')->nullable();
            $table->string('slogan')->length(50)->nullable();
            $table->string('phone')->length(11)->nullable();
            $table->string('email')->length(100)->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('youtube')->nullable();
            $table->text('instagram')->nullable();
            $table->text('map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
