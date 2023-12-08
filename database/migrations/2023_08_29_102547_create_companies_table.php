<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16)->unique();
            $table->string('slug', 32)->unique();
            $table->string('image_path', 2048)->nullable();
            $table->string('website', 2048)->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('description')->nullable();
            $table->integer('employees_amount')->nullable();
            $table->json('address')->nullable();
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
