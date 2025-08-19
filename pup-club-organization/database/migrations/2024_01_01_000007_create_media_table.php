<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('original_filename');
            $table->string('mime_type');
            $table->integer('file_size');
            $table->string('file_path');
            $table->string('thumbnail_path')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('alt_text')->nullable();
            $table->enum('type', ['image', 'video', 'document', 'audio'])->default('image');
            $table->string('collection')->default('gallery');
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('event_id')->nullable();
            $table->string('news_id')->nullable();
            $table->integer('order_column')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            
            $table->index(['organization_id', 'type']);
            $table->index(['collection', 'order_column']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};
