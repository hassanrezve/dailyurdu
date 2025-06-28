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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('slug')->unique();
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
            
            // Add indexes for frequently queried columns
            $table->index('created_at'); // For latest() queries
            $table->index('views'); // For popular articles
            $table->index(['created_at', 'views']); // Composite index for complex queries
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
