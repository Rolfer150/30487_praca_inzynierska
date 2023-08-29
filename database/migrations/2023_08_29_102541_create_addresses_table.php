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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city', 30);
            $table->string('street', 30);
            $table->string('home_nr', 5);
            $table->string('flat_nr', 5)->nullable();
            $table->string('zip_code', 6);
            $table->float('latitude', 8, 6);
            $table->float('longitude', 8, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
