<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'contact',
        'image',
        'address',
        'address_2',
        'contents',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'status',
        'search_engine',
        'display_order',
        'page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
    ];
}
