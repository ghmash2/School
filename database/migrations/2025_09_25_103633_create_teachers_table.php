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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->date('join_date')->nullable();
            $table->date('retire_date')->nullable();
            $table->string('image')->nullable();
            $table->string('dept')->nullable();
            $table->string('designation')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
