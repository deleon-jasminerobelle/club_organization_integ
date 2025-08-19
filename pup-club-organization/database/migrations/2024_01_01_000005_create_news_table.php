<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('excerpt')->nullable();
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->enum('type', ['announcement', 'news', 'event', 'general'])->default('news');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
            
            $table->index(['organization_id', 'is_published']);
            $table->index(['type', 'published_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};
