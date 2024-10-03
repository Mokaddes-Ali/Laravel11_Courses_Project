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
            $table->float('price')->default(0);
            $table->text('content');
            $table->text('link');
            $table->unsignedBigInteger('submitted_by');
            $table->unsignedBigInteger('duration');
            $table->unsignedTinyInteger('level');

            $table->foreign('submitted_by')->references('id')->on('users');
            $table->foreign('platform_id')->references('id')->on('platforms');

            $table->int('platform_id');
            $table->PRIMARY KEY (`id`)
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
