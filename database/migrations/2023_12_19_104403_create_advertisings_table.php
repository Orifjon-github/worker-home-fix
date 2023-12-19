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
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_uz')->nullable();
            $table->text('description');
            $table->text('description_uz')->nullable();
            $table->text('image')->nullable();
            $table->text('image_uz')->nullable();
            $table->enum('enable', [0 , 1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisings');
    }
};
