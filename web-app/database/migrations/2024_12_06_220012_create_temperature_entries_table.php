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
        Schema::create('temperature_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('device_id')
                ->constrained('devices')
                ->cascadeOnDelete();
            $table->float('temperature');
            $table->float('humidity');
            $table->boolean('mock');
            $table->timestamp('measured_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperature_entries');
    }
};
