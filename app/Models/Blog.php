<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
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
        'breadcrumb',
        'service_id',
        'cover_image',
        'pro_id',
        'date',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, );
    }
}
