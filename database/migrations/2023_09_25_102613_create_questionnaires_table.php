<?php

use App\Models\User;
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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('description', 128);
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignId('offer_id')
                ->nullable()
                ->constrained('offers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire');
    }
};
