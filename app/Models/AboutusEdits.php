<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutusEdits extends Model
{
    // Specify the table name (if it's different from 'aboutus_edits')
    protected $table = 'aboutus_edits';

    // Define the fillable attributes
    protected $fillable = [
        'journey_heading',
        'journey_img',
        'vision_heading',
        'vision_desc',
        'vision_img',
    ];
}