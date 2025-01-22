<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Settings extends Model
{
    use HasTranslations; 
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
    public $translatable = [
        'slogan',
        'address',
        'address2',
        'about_us',
    ];
    public $timestamps = false;
}
