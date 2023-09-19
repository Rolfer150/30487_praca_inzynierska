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
        Schema::create('application_file_offer_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_file_id')
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
        Schema::dropIfExists('application_file_offer_application');
    }
};
