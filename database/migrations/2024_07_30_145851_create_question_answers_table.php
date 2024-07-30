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
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('question_ru')->nullable();
            $table->text('question_en')->nullable();
            $table->text('answer');
            $table->text('answer_ru')->nullable();
            $table->text('answer_en')->nullable();
            $table->text('button_text');
            $table->text('button_text_ru')->nullable();
            $table->text('button_text_en')->nullable();
            $table->text('button_url');
            $table->enum('enable', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};
