<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Project extends Model
{
    use LogsActivity;
    use HasTranslations;
    protected $fillable = [
        'name',
        'slug',
        'contents',
        'description',
        'link',
        'color_code',
        'status',
        'cover_image',
        'details_image',
        'gallery_images',
        'client',
        'services',
        'category_id',
        'categories_id',
        'search_engine',
        'display_order',
        'site_visibility',
        'section_data',
        'page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'sector',
        'country',
        'industry',
    ];
    public  $translatable = [
        'name',
        'contents',
        'description',
        'section_data',
        'page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'og_type',
        'sector',
        'country',
        'industry',
    ];  
      public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])->useLogName('Project');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\ProjectCategory', 'category_id', 'id');
    }
}
