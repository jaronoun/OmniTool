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
        Schema::table('tasks', function (Blueprint $table) {
            // Add the schedule_id column
            $table->unsignedBigInteger('schedule_id')->nullable();

            // Define a foreign key constraint
            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('set null'); // You can change this to 'restrict' or 'set null' as per your needs
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign key first
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['schedule_id']);
        });

        // Now drop the column
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('schedule_id');
        });
    }
};
