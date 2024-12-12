<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    	'title',
    	'contents',
    	'location',
    	'type',
    	'department',
        'salary',
    	'positions',
    	'level',
    	'apply_before',
    	'status',
    	'page_title',
    	'meta_keywords',
    	'meta_description',
    	'slug',
    	'file',
        'header_image',
    	'category_id',
        'search_engine',
        'education',
        'experience',
		'og_title',
        'og_description',
        'og_image',
        'og_type',
		'about_description',
    ];
    public function category()
    {
    	return $this->belongsTo('App\Models\JobCategory','category_id');
    }
}
