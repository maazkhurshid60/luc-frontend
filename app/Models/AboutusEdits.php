<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutusEdits extends Model
{
    use HasTranslations;
    protected $table = 'aboutus_edits';

    protected $fillable = [
        'journey_heading',
        'journey_img',
        'vision_heading',
        'vision_desc',
        'vision_img',
    ];
    public $translatable = [
        'journey_heading',
        'vision_heading',
        'vision_desc',
    ];
}
