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
        Schema::create('model_dataset_type', function (Blueprint $table) {
            $table->foreignId('model_id')->constrained('models')->cascadeOnDelete();
            $table->foreignId('dataset_type_id')->constrained('dataset_types')->cascadeOnDelete();
            $table->primary(['model_id', 'dataset_type_id'], 'model_dataset_type_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_dataset_type');
    }
};
