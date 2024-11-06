<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
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
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\ProjectCategory', 'category_id', 'id');
    }
}
