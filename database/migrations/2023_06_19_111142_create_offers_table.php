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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_name', 64);
            $table->string('slug', 2048);
            $table->string('image_path',128)->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('active');
            $table->dateTime('published_at');
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
