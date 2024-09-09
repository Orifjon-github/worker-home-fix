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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('type', ['debit', 'credit'])->default('credit');
            $table->bigInteger('amount')->default(0);
            $table->string('from')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('services')->nullable();
            $table->string('status')->default('create');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
