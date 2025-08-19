<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['name' => 'President', 'slug' => 'president', 'description' => 'Organization President', 'level' => 5],
            ['name' => 'Vice President', 'slug' => 'vice-president', 'description' => 'Organization Vice President', 'level' => 4],
            ['name' => 'Secretary', 'slug' => 'secretary', 'description' => 'Organization Secretary', 'level' => 3],
            ['name' => 'Treasurer', 'slug' => 'treasurer', 'description' => 'Organization Treasurer', 'level' => 3],
            ['name' => 'Member', 'slug' => 'member', 'description' => 'Regular Organization Member', 'level' => 1],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
