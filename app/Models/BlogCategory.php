<?php

namespace App\Models;

use App\Models\Blog;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use LogsActivity;
    use HasFactory;
    use HasTranslations;

    protected $table = 'blog_categories';

    protected $fillable = ['title'];
    public $translatable = ['title'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->useLogName('Blog Category');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
