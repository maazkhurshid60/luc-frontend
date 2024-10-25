<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table ='faq_categories';
    protected $fillable = [
        'title',
        'description'
    ];
    public function faqs()
    {
        return $this->hasMany('App\Models\Faq','category_id')->where('status','active');
    }
}
