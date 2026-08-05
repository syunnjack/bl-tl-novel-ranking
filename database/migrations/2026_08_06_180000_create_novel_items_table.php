<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('novel_items', function (Blueprint $table) {
            $table->id();
            $table->string('content_id')->unique();
            $table->string('category');
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('image_url')->nullable();
            $table->string('url');
            $table->string('affiliate_url');
            $table->unsignedInteger('price')->nullable();
            $table->decimal('review_average', 3, 2)->nullable();
            $table->unsignedInteger('review_count')->default(0);
            $table->timestamps();
            $table->index(['category', 'review_count']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('novel_items');
    }
};
