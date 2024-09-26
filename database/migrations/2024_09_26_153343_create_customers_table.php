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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(100);
            $table->string('customer_code')->length(6);
            $table->string('email')->length(100)->unique();
            $table->string('username')->length(30)->unique();
            $table->string('password')->hash();
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->default(1)->comment('1 => Active, 2 => Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
