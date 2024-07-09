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
        //remove user_id and exercise_id from exercise_executed
        Schema::table('exercise_executed', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
//            $table->dropForeign(['exercise_id']);
            $table->dropColumn('exercise_id');
        });
        //add table todo_logs with columns id, todo_id, data (json), created_at, updated_at
        Schema::create('todo_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_id')->constrained();
            $table->json('data');
            $table->timestamps();
        });
        //add table deadline_logs with columns id, deadline_id, data (json), created_at, updated_at
        Schema::create('deadline_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deadline_id')->constrained();
            $table->json('data');
            $table->timestamps();
        });
        //change table logs to task_logs with columns id, task_id, data (json), created_at, updated_at and remove user_id and deadline_id
        Schema::table('logs', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
//            $table->dropForeign(['deadline_id']);
            $table->dropColumn('deadline_id');
            $table->rename('task_logs');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercise_executed', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('exercise_id')->constrained();
        });
        Schema::dropIfExists('todo_logs');
        Schema::dropIfExists('deadline_logs');
        Schema::table('task_logs', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('deadline_id')->constrained();
            $table->rename('logs');
        });
    }
};
