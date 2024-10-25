<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class HiringApplication extends Model
{
    protected $table = 'hiring_applications';

    protected $fillable = ['name', 'email', 'contact_no', 'service', 'technology', 'subject', 'message', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
