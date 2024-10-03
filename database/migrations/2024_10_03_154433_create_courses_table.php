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
            $table->string('content', 255);
            $table->string('link', 255);
            $table->unsignedBigInteger('submitted_by');
            $table->float('duration')->default(0.00);
            $table->unsignedTinyInteger('level')->default(0);
            $table->int('platform_id')->default(0);
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
