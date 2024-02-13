<?php

namespace App\Providers;

use App\Models\ClubScore;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('unique_match', function ($attribute, $value, $parameters, $validator) {
        $data = $validator->getData();
        $matchCount = ClubScore::where('home_team_id', $data['home_team_id'])
            ->where('away_team_id', $data['away_team_id'])
            // ->where('match_date', $data['match_date'])
            ->count();

        return $matchCount === 0;
    });
    }
}
