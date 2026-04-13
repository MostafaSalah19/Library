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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('isbn')->unique();
            $table->date('published_year');
            $table->integer('pages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
