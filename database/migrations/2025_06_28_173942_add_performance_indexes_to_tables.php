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
        // Add indexes to posts table
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasIndex('posts', 'posts_created_at_index')) {
                $table->index('created_at', 'posts_created_at_index');
            }
            if (!Schema::hasIndex('posts', 'posts_views_index')) {
                $table->index('views', 'posts_views_index');
            }
            if (!Schema::hasIndex('posts', 'posts_created_at_views_index')) {
                $table->index(['created_at', 'views'], 'posts_created_at_views_index');
            }
        });

        // Add indexes to categories table
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasIndex('categories', 'categories_name_index')) {
                $table->index('name', 'categories_name_index');
            }
        });

        // Add indexes to search_terms table
        Schema::table('search_terms', function (Blueprint $table) {
            if (!Schema::hasIndex('search_terms', 'search_terms_count_index')) {
                $table->index('count', 'search_terms_count_index');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes from posts table
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndexIfExists('posts_created_at_index');
            $table->dropIndexIfExists('posts_views_index');
            $table->dropIndexIfExists('posts_created_at_views_index');
        });

        // Remove indexes from categories table
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndexIfExists('categories_name_index');
        });

        // Remove indexes from search_terms table
        Schema::table('search_terms', function (Blueprint $table) {
            $table->dropIndexIfExists('search_terms_count_index');
        });
    }
};
