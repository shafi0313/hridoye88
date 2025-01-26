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
        Schema::create('literatures', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id')->nullable()->constrained()->onDeleteSetNull();
            $table->string('name');
            $table->string('writer');
            $table->decimal('price', 8, 2)->nullable();
            $table->float('discount')->nullable();
            $table->text('description')->nullable();
            $table->string('publisher')->nullable();
            $table->date('published_at')->nullable();
            $table->string('cover_img',32)->nullable();
            $table->string('back_cover_img',32)->nullable();
            $table->string('pdf',32)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('literatures');
    }
};
