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
        Schema::create('woker_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->integer('is_success')->nullable();
            $table->integer('task_id')->nullable();
            $table->timestamps();
        });
        Schema::connection('mysql2')->table('tasks', function (Blueprint $table) {
            $table->integer('duration')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woker_ratings');
//        Schema::connection('mysql')->table('tasks', function (Blueprint $table) {
//            $table->dropColumn('duration');
//        });
    }
};
