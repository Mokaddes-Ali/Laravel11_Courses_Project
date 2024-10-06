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
            $table->unsignedBigInteger('submitted_by');
            $table->unsignedBigInteger('duration');
            $table->unsignedBigInteger('platform_id');

            $table->foreign('submitted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('course_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('series_id');
            $table->timestamps(0);

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
        });


        Schema::create('course_topic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });


        Schema::create('course_author', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
