<?php

namespace App\Models;

use App\Models\Company;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Service extends Model
{
    use LogsActivity;
    use HasTranslations; 
    protected $fillable = [
        'title',
        'icon',
        'description',
        'status',
        'file',
        'file2',
         'banner',
        'contents',
        'is_featured',
        'slug',
        'page_title',
        'meta_keywords',
        'display_order',
        'position',
        'meta_description',
        'search_engine',
        'file4',
        'bg_color',
        'featured_projects',
        'projectcategory',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'second_image',
        'seo_more_heading',
        'seo_more_content',
        'company_id',
    ];
    public $translatable = [
        'title',
        'description',
        'contents',
        'seo_more_heading',
        'seo_more_content',
        'page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'og_type'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])->useLogName('Services');
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
