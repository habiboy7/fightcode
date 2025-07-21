<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('content_url');// bisa text video dll
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};
