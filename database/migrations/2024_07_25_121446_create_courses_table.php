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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->longText('course_outlines')->nullable();
            $table->longText('course_benefits')->nullable();
            $table->string('course_image')->nullable();
            $table->text('course_title')->nullable();
            $table->text('course_name')->nullable();
            $table->string('course_name_slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('video')->nullable();
            $table->string('duration')->nullable();
            $table->string('start_date')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('language')->nullable();
            $table->string('level')->nullable();
            $table->string('pdf_file')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = Inactive', '1=Active')->nullable();
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
