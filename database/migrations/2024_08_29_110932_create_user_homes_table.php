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
        Schema::create('user_homes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['home', 'office']);
            $table->string('name')->nullable();
            $table->string('long');
            $table->string('lat');
            $table->string('title');
            $table->string('entrance')->nullable();
            $table->string('floor')->nullable();
            $table->string('number')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_homes');
    }
};
