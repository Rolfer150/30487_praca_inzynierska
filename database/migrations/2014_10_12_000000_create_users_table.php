<?php

use App\Enums\EducationalStage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('image_path')->default('user/user-profile-default.jpg')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('education', EducationalStage::values())->nullable();
            $table->string('school')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->json('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
