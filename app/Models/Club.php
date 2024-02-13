<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'points'
    ];

   public function homeMatches()
    {
        return $this->hasMany(ClubScore::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(ClubScore::class, 'away_team_id');
    }

    public function addPoints($points)
    {
        $this->points += $points;
        
        if ($this->points < 0) {
            $this->points = 0;
        }

        $this->save();
    }

    public function getPlayedAttribute()
    {
        return $this->homeMatches()->count() + $this->awayMatches()->count();
    }

    public function getWinsAttribute()
    {
         return $this->homeMatches()->where('home_team_score', '>', 'away_team_score')->count();
    }

    public function getDrawsAttribute()
    {
        return $this->homeMatches()->where('home_team_score', '=', 'away_team_score')->count();
    }

    public function getLossesAttribute()
    {
        return $this->awayMatches()->where('away_team_score', '>', 'home_team_score')->count();
    }

    public function getGoalsForAttribute()
    {
        return $this->getPlayedAttribute() * $this->getWinsAttribute();
    }

    public function getGoalsAgainstAttribute()
    {
        return $this->getPlayedAttribute() * $this->getLossesAttribute();
    }
}
