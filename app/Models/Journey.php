<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Journey extends Model
{
    use HasTranslations;
    protected $table = 'journeys';
    protected $fillable = [
        'year',
        'month',
        'title',
        'description',
    ];
    public $translatable = [
        'month',
        'title',
        'description',
    ];
}
