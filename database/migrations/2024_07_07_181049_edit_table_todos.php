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
        //change title to name
        Schema::table('todos', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //change name to title
        Schema::table('todos', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
        });
    }
};
