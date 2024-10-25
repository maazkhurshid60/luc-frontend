<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'projects_categories';
    protected $fillable = [
        'title', 'parent_id', 'image', 'icon',
    ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'category_id');
    }
}
