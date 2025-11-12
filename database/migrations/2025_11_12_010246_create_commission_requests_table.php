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
        Schema::create('commission_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 160);
            $table->string('instagram', 160)->nullable();
            $table->string('budget', 60)->nullable();
            $table->string('placement', 120)->nullable();
            $table->string('size', 60)->nullable();
            $table->string('preferred_dates', 160)->nullable();
            $table->text('description');
            $table->json('image_paths')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_requests');
    }
};
