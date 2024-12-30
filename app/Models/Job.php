<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Job extends Model
{
	use HasTranslations;
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
	public $translatable = [
		'title',
		'contents',
		'location',
		'type',
		'job_type',
		'department',
		'level',
		'experience',
		'education',
		'page_title',
		'meta_keywords',
		'meta_description',
		'og_title',
		'og_description',
		'og_type',
	];
    public function category()
    {
    	return $this->belongsTo('App\Models\JobCategory','category_id');
    }
}
