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
        Schema::table('calender_timelines', function (Blueprint $table) {
            $table->dropColumn(columns: 'year_calender_timeline_id');
            $table->string('document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calender_timelines', function (Blueprint $table) {
            $table->string('year_calender_timeline_id')->nullable();
            $table->string('document')->nullable();
        });
    }
};
