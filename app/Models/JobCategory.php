<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
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
    public function jobs()
    {
    	return $this->hasMany('App\Models\Job','category_id');
    }
}
