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
        //add name to user_exercises
        Schema::table('user_exercises', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
        //remove schedule_id from tasks
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['schedule_id']);
            $table->dropColumn('schedule_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remove name from user_exercises
        Schema::table('user_exercises', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        //add schedule_id to tasks
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('schedule_id')->constrained();
        });
    }
};
