<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasTranslations;
    protected $fillable = [
        'question',
        'answer',
        'category_id',
        'status',
    ];
    public $translatable = [
        'question',
        'answer',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\FaqCategory','category_id','id');
    }
}
