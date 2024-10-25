<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'title_color',
        'sub_title',
        'sub_title_color',
        'description',
        'description_color',
        'image',
        'sub_image',
        'link',
        'status'
    ];
}
