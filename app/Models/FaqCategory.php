<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FaqCategory extends Model
{
    use HasTranslations;
    protected $table = 'faq_categories';
    protected $fillable = ['title', 'description'];
    public $translatable = ['title', 'description'];
    public function faqs()
    {
        return $this->hasMany('App\Models\Faq', 'category_id')->where('status', 'active');
    }
}
