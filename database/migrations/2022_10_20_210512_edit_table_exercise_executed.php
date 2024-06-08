<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercise_executed', function (Blueprint $table) {

            $table->integer('user_exercise_id')->change()->nullable();
            $table->integer('exercise_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercise_executed', function (Blueprint $table) {
            $table->integer('user_exercise_id')->nullable(false);
            $table->dropColumn('exercise_id');
        });
    }
};
