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
            $table->string('name', 255);
            $table->unsignedBigInteger('book')->default(0);
            $table->unsignedSmallInteger('year');
            $table->float('price')->default(0.00);
            $table->string('image', 255)->nullable();
            $table->string('slug', 255);
            $table->text('content');
            $table->text('link');
            $table->unsignedBigInteger('submitted_by')->nullable();
            $table->unsignedBigInteger('duration');
            $table->unsignedTinyInteger('platform_id')->nullable();

            $table->foreign('submitted_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');

            $table->timestamps();
        });


        Schema::table('course_topic', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('set null');
        });

        Schema::table('course_series', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('series_id')->nullable();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('set null');
        });

        Schema::table('course_author', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
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
