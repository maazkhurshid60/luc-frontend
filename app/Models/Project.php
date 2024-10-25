<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'page_title',
        'meta_keywords',
        'meta_description',
        'contents',
        'description',
        'image',
        'image2',
        'client',
        'services',
        'link',
        'category_id',
        'status',
        'categories_id',
        'color_code',
        'search_engine',
        'display_order',
        'site_visibility',
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
