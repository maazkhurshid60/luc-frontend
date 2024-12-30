<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class JobCategory extends Model
{
	use HasTranslations;
    protected $fillable = [
    	'title',
    	'description',
    	'status',
    	'page_title',
    	'meta_keywords',
    	'meta_description',
    	'slug',
    	'file',
    ];
	public $translatable = [
    	'title',
    	'description',
	];
    public function jobs()
    {
    	return $this->hasMany('App\Models\Job','category_id');
    }
}
