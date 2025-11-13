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
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 280);
            $table->longText('long_description_public')->nullable();
            $table->longText('long_description_private')->nullable();
            $table->unsignedTinyInteger('trl_level')->index();
            $table->json('availability_flags')->nullable();
            $table->string('status')->default('draft')->index();
            $table->boolean('is_kit')->default(false);
            $table->string('kind')->nullable();
            $table->boolean('is_highlighted')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
