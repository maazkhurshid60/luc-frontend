<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasTranslations;
    protected $fillable = [
        'title',
        'description',
        'type',
        'image',
        'start_date',
        'end_date',
        'status'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->useLogName('Announcement');
    }
    public $translatable = [
        'title',
        'description',
    ];
}
