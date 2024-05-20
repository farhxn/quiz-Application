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
        Schema::create('attempt_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question',1000)->nullable();
            $table->string('correctAnswer',1000)->nullable();
            $table->string('userAnswer',1000)->nullable();
            $table->string('bank',1000)->nullable();
            $table->string('userId')->nullable();
            $table->string('UserName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempt_questions');
    }
};
