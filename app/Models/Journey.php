<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $table = 'journeys';
    protected $fillable = [
        'year',
        'month',
        'title',
        'description',
    ];

}
