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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->string('slug', 128)->unique();
            $table->string('url',2048)->nullable();
            $table->longText('description')->nullable();
            $table->integer('employees_amount')->nullable();
            $table->foreignId('address_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class,'user_id');
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
