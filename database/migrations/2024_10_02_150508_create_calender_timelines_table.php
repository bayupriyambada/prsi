<?php

use App\Models\YearCalenderTimeline;
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
        Schema::create('calender_timelines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('category')->nullable();
            $table->string('district')->nullable();
            $table->string('country')->nullable();
            $table->foreignIdFor(YearCalenderTimeline::class)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calender_timelines');
    }
};
