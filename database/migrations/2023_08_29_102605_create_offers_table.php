<?php

use App\Enums\PaymentType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('slug', 128);
            $table->string('image_path', 2048)->nullable();
            $table->longText('description')->nullable();
            $table->float('salary')->nullable();
            $table->float('min_salary')->nullable();
            $table->float('max_salary')->nullable();
            $table->enum('payment', PaymentType::values())
                ->default(PaymentType::MBRUTTO->value);
            $table->integer('vacancy')->default(1);
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
            $table->foreignId('work_mode_id')
                ->nullable()
                ->constrained('work_modes')
                ->cascadeOnDelete();
            $table->boolean('active');
            $table->foreignIdFor(User::class, 'user_id');
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
