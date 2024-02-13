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
        Schema::create('club_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('home_team_id')->unsigned();
            $table->integer('away_team_id')->unsigned();
            $table->integer('home_team_score');
            $table->integer('away_team_score');
            $table->date('match_date');
            $table->timestamps();

            $table->foreign('home_team_id')->references('id')->on('clubs');
            $table->foreign('away_team_id')->references('id')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_scores');
    }
};
