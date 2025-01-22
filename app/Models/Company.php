<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Model
{
    use LogsActivity;
    use HasTranslations;
    protected $fillable = ['name', 'slug', 'short_description', 'company_email', 'contact', 'image', 'companyIcon', 'address', 'address_2', 'contents', 'facebook', 'twitter', 'instagram', 'linkedin', 'status', 'search_engine', 'display_order', 'page_title', 'meta_keywords', 'meta_description', 'og_title', 'og_description', 'og_image', 'og_type'];
    public $translatable = ['short_description', 'address', 'address_2', 'contents', 'page_title', 'meta_keywords', 'meta_description', 'og_title', 'og_description'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->useLogName('Company');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'company_id');
    }
}
