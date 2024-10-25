<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'page_title',
        'meta_keywords',
        'meta_description',
        'short_description',
        'link',
        'contents',
        'image',
        'status',
        'display_order',
        'search_engine',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
    ];

    public function files()
    {
        return $this->hasMany(ProductFile::class, 'product_id');
    }
}
