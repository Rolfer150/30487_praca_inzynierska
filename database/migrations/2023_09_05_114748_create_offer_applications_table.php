<?php

use App\Enums\OfferApplicationStatus;
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
        Schema::create('offer_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->nullable();
            $table->enum('status', OfferApplicationStatus::values())
                ->default('dostarczono');
            $table->foreignId('offer_id')
                ->nullable()
                ->constrained('offers');
            $table->timestamps();
            $table->foreignId('appfiles_id')
                ->nullable()
                ->constrained('application_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_applications');
    }
};
