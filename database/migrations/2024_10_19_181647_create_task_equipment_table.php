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
        Schema::create('task_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id'); // Task from another database
            $table->unsignedBigInteger('equipment_id'); // Equipment from the current database
            $table->timestamps();

            $table->index('task_id');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->unique(['task_id', 'equipment_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_equipment');
    }
};
