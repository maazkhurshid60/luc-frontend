<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasTranslations;
    protected $table = 'projects_categories';
    protected $fillable = [
        'title', 'parent_id', 'image', 'icon',
    ];
    public $translatable = [
        'title'
    ];  

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'category_id');
    }
}
