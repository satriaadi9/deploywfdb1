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
            $table->id('id')->autoIncrement();
            $table->string('course_code', 6);
            $table->year('curriculum_year');
            $table->string('course_name');
            $table->string('course_name_en');
            $table->foreignId('unit_id')->constrained(
                table: 'units', indexName: 'course_unit_id'
            );
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->ipAddress('ip_address')->nullable();
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
