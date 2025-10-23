<?php

use Illuminate\Support\Facades\Schema;
use Modules\Course\Enums\CourseStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('video');
            $table->string('level');
            $table->string('status')->default(CourseStatus::DRAFT->value);
            $table->string('price')->default(0);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
