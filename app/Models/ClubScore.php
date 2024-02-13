<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'home_team_score',
        'away_team_score',
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Club::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Club::class, 'away_team_id');
    }
}
