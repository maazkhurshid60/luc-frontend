<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    protected $fillable = [
        'name',
        'image',
        'designation',
        'reviews',
        'status'
    ];
}
