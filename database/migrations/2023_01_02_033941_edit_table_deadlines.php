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
        Schema::table('deadlines', function (Blueprint $table) {
            $table->renameColumn('scheduled_date', 'scheduled_dates')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deadlines', function (Blueprint $table) {
            $table->renameColumn('scheduled_dates', 'scheduled_date')->change();});
    }
};
