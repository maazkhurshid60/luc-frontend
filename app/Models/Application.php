<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'contact_no',
    	'description',
    	'file',
    	'job_id'
    ];
    public function job()
    {
    	return $this->belongsTo(Job::class,'job_id');
    }
}
