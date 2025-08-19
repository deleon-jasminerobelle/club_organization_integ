<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime');
            $table->string('location');
            $table->string('venue')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('type')->default('general'); // workshop, meeting, competition, social
            $table->boolean('is_public')->default(true);
            $table->string('featured_image')->nullable();
            $table->enum('status', ['scheduled', 'ongoing', 'completed', 'cancelled', 'postponed'])->default('scheduled');
            $table->integer('view_count')->default(0);
            $table->timestamps();
            
            $table->index(['organization_id', 'start_datetime']);
            $table->index(['type', 'status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
