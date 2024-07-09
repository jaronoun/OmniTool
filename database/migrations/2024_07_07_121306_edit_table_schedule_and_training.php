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
        //make schedule and training description nullable
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
        Schema::table('training', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //make schedule and training description not nullable
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('description')->nullable(false)->change();
        });
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('description')->nullable(false)->change();
        });
    }
};
