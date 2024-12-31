<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class ProjectCategory extends Model
{
    use LogsActivity;
    use HasTranslations;
    protected $table = 'projects_categories';
    protected $fillable = [
        'title', 'parent_id', 'image', 'icon',
    ];
    public $translatable = [
        'title'
    ];  
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])->useLogName('Project Category');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'category_id');
    }
}
