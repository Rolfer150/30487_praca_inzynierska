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
        Schema::create('driving_licence_user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driving_licence_id')
                ->constrained('application_files')
                ->cascadeOnDelete();
            $table->foreignId('offer_application_id')
                ->constrained('offer_applications')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_licence_user_profile');
    }
};
