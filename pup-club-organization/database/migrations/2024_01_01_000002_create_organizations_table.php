<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('email')->unique();
            $table->string('facebook_page')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_recognized')->default(false);
            $table->date('established_date')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
