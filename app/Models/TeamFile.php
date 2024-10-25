<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class TeamFile extends Model
{
    protected $fillable = [
        'title',
        'file',
        'team_id',
        'display_order',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
