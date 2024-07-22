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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('image')->nullable();
            $table->text('video_url')->nullable();
            $table->enum('rate', [1, 2, 3, 4, 5])->default(5);
            $table->enum('enable', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
