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
        Schema::create('model_metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('models')->cascadeOnDelete();
            $table->unsignedBigInteger('views_total')->default(0);
            $table->unsignedBigInteger('views_last_30d')->default(0);
            $table->unsignedBigInteger('demo_clicks')->default(0);
            $table->unsignedBigInteger('video_clicks')->default(0);
            $table->timestamps();
            $table->unique('model_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_metrics');
    }
};
