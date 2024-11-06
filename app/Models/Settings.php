<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
    	'siteName',
    	'slogan',
    	'logo',
    	'icon',
    	'fb',
    	'twitter',
    	'youtube',
    	'googleplus',
        'instagram',
        'linkedin',
    	'email',
    	'phone',
    	'address',
        'email2',
        'phone2',
        'address2',
        'map',
        'about_us',
        'video'
    ];
    public $timestamps = false;
}
