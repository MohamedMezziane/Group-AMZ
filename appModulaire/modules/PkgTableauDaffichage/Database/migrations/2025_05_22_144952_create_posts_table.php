<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); // Title
            $table->string('image_url')->nullable(); // Image URL (nullable)
            $table->text('description'); // Description
            $table->foreignId('categorie_id') // Foreign key to post_categories
                ->constrained('post_categories')
                ->onDelete('cascade');
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
