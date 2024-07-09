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
        //add is_done to todos
        Schema::table('todos', function (Blueprint $table) {
            $table->boolean('is_done')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remove is_done from todos
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('is_done');
        });
    }
};
