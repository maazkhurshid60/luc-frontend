<?php

namespace App\Models;

use App\Models\HiringApplication;
use App\Models\TeamFile;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    protected $fillable = [
        'name',
        'designation',
        'image',
        'description',
        'facebook',
        'twitter',
        'instagram',
        'mail',
        'status',
        'details',
        'enable_fix',
        'page_title',
        'meta_keywords',
        'meta_description',
        'hourly_rate',
        'tool_label',
        'display_order',
        'short_designation',
        'success_rate',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'consultation_link',
    ];

    public function files()
    {
        return $this->hasMany(TeamFile::class);
    }

    public function applications()
    {
        return $this->hasMany(HiringApplication::class);
    }
}
