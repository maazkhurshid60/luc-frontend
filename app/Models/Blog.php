<?php

namespace App\Models;

use App\Models\BlogCategory;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Blog extends Model
{
    use LogsActivity;
    use HasTranslations;
    protected $fillable = [
        'title',
        'short_description',
        'slug',
        'page_title',
        'meta_keywords',
        'meta_description',
        'contents',
        'image',
        'user',
        'tags',
        'status',
        'search_engine',
        'display_order',
        'category_id',
        'service_id',
        'cover_image',
        'date',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
    ];
    public $translatable = ['title','short_description','contents','page_title','meta_keywords','meta_description','og_title','og_description','og_type'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->useLogName('Blog');
    }
    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
}
