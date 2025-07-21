<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('level')->default('beginner');
            $table->integer('price')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            // Foreign key ke tabel users (yg bikin course)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
