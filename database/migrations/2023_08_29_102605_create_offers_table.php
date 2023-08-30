<?php

use App\Enums\PaymentType;
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
            $table->string('name', 64)->unique();
            $table->string('slug', 128)->unique();
            $table->string('image_path',2048)->nullable();
            $table->longText('description')->nullable();
            $table->float('salary')->nullable();
            $table->float('min_salary')->nullable();
            $table->float('max_salary')->nullable();
            $table->enum('payment',PaymentType::values())
                ->default('brutto/godz');
            $table->integer('vacancy')->nullable();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->cascadeOnDelete();
            $table->foreignId('employment_id')
                ->nullable()
                ->constrained('employments')
                ->cascadeOnDelete();
            $table->foreignId('contract_id')
                ->nullable()
                ->constrained('contracts')
                ->cascadeOnDelete();
            $table->foreignId('workmode_id')
                ->nullable()
                ->constrained('workmodes')
                ->cascadeOnDelete();
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
