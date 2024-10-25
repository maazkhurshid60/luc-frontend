<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'description',
        'status',
        'file',
        'file2',
         'banner',
        'contents',
        'is_featured',
        'slug',
        'page_title',
        'meta_keywords',
        'display_order',
        'position',
        'meta_description',
        'search_engine',
        'file4',
        'bg_color',
        'featured_projects',
        'projectcategory',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'second_image',
        'seo_more_heading',
        'seo_more_content',
    ];
}
