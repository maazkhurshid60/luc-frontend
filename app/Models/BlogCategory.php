<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = "blog_categories";

    protected $fillable = [
        'title',
    ];
    public $translatable = [
        'title'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class,);
    }
}
