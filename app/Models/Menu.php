<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'name',
        'slug',
        'page_title',
        'meta_keywords',
        'meta_description',
        'heading',
        'short_description',
        'description',
        'image',
        'images',
        'video',
        'display',
        'display_order',
        'position',
        'show_services',
        'parent',
        'search_engine',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'about_img',
        'about_description',

    ];
}
