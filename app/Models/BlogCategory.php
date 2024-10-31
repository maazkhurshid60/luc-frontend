<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = "blog_categories";

    protected $fillable = [
        'title',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class,);
    }
}
